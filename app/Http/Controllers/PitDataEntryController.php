<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PitDataEntry;

class PitDataEntryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', PitDataEntry::class);
        $data = PitDataEntry::all();
        return view('pitscoutindex', ['data' => $data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', PitDataEntry::class);
        return view('pitscoutcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'uid' => 'required',
            'event' => 'required',
            'teamid' => 'required|integer',
            'chassis_drive' => 'required',
            'two_speeds' => 'required',
            'weight' => 'numeric',
            'num_motors' => 'required|integer|min:0',
            'type_motors' => 'required',
            'num_wheels' => 'required|integer|min:0',
            'type_wheels' => 'required',
            'fit_trench' => 'required',
            'wheel' => 'required',
            'can_climb' => 'required',
            'move_bar' => 'required',
        ]);
        
        $data['what_goal'] = $request->get('what_goal');
        $data['other'] = $request->get("other");
       
        $dataEntry = PitDataEntry::create($data);
       
        return redirect()->route('pitscout.create')->with('success', 'Data submitted successfully!');
        
    }

    public function teamView(Request $request)
    {
        $this->authorize('viewAny', PitDataEntry::class);
        $teams = PitDataEntry::select('teamid')->where('event', session('event'))->distinct()->get();
        return view('teams', ['teams' => $teams]);
    }

    public function singleTeamView(Request $request, $teamid)
    {
        $this->authorize('viewAny', PitDataEntry::class); 
        $pitscoutdata = PitDataEntry::where([
            ['teamid', '=', $teamid],
            ['event', '=', session('event')],
        ])->get();
        if (count($pitscoutdata) == 0) {
            abort(404);
        }
        return view('team', ['pitscoutdata' => $pitscoutdata, 'team' => $teamid]);
    }

    public function matchView(Request $request)
    {
        $this->authorize('viewAny', PitDataEntry::class);
        $matches = DB::table('match_schedule')->get();
        return view('matches', ['matches' => $matches]);
    }

    public function singleMatchView(Request $request, $match)
    {
        $this->authorize('viewAny', PitDataEntry::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
