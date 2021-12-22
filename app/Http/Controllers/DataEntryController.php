<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataEntry;
use App\PitDataEntry;
use App\User;

class DataEntryController extends Controller
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
        $this->authorize('viewAny', DataEntry::class);
        $columns = DB::getSchemaBuilder()->getColumnListing("data_entries");
        $data = DataEntry::where('justin', '0')->orderBy('created_at', 'desc')->get();
        $dataJustin = DataEntry::where('justin', '1')->orderBy('created_at', 'desc')->get();
        // $data = DataEntry::all()->orderBy('created_at', 'desc')->get();
        foreach ($data as $entry) {
            $entry->attributedVals = [
                'uid' => User::find($entry->uid)->name,
                'event' => DB::table('events')->find($entry->event),
                'alliance' => DataEntry::returnAlliance($entry->alliance),
                'startl' => DataEntry::returnStarting($entry->startl), 
                'intline' => DataEntry::returnYesNo($entry->intline), // boolean
                'apick' => DataEntry::returnYesNo($entry->apick),  // boolean
                
                'woj1' => DataEntry::returnYesNo($entry->woj1),  // boolean
                'woj2' => DataEntry::returnYesNo($entry->woj2),  // boolean
                
                'defed' => DataEntry::returnYesNo($entry->defed),  // boolean
                'defing' => DataEntry::returnYesNo($entry->defing),  // boolean
                'hang' => DataEntry::returnYesNo($entry->hang),  // boolean
                'park' => DataEntry::returnYesNo($entry->park),  // boolean
                'lvl' => DataEntry::returnYesNo($entry->lvl),  // boolean
            ];
        }
        return view('scoutindex', compact('data', 'dataJustin', 'columns'));
    }
    
    public function getTeamList(Request $request) {
        $event =  session('event');
        $data = DB::table('match_schedule')->where([
            ['match', '=', $request->match],
            ['event', '=', $event],
        ])->first();
        if ($data != "") {
            if ($request->input('alliance') == 1) {
                return "<select class=\"form-control\" id=\"teamnum\" name=\"teamid\">
                      <option value='$data->red1'>$data->red1</option>
                      <option value='$data->red2'>$data->red2</option>
                      <option value='$data->red3'>$data->red3</option>
                    </select>";
            }
            else if ($request->input('alliance') == 2) {
                return "<select class=\"form-control\" id=\"teamnum\" name=\"teamid\">
                    <option value='$data->blue1'>$data->blue1</option>
                    <option value='$data->blue2'>$data->blue2</option>
                    <option value='$data->blue3'>$data->blue3</option>
                </select>";
            }
        }
        else {
            return "<input type=\"number\" id=\"teamnum\" name=\"teamid\" class=\"form-control\" placeholder=\"Team Number\"required>";
            // return "<input type=\"number\" class=\"form-control\" id=\"teamNumber\" name=\"team_num\" min=\"0\" value=\"{{ old('team_num') }}\">";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', DataEntry::class);
        return view('scoutcreatenew', ['justin' => 0]);
        
        // return app($dataType->model_name);
    }
    
    /**
     * Show the form for creating a new resource (but Justinized).
     *
     * @return \Illuminate\Http\Response
     */
    public function justinView()
    {
        $this->authorize('create', PitDataEntry::class);
        return view('scoutcreate', ['justin' => 1]);
        
        // return app($dataType->model_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //the first part of the info is going to be part of the session
        //uid
        //event
        //alliance
        $data = $request->validate([
            'uid' => 'required',
            'event' => 'required',
            'match' => 'required|integer|min:1',
            'teamid' => 'required|integer',
            'alliance' => 'required',
            'startl' => 'required|integer|min:0',
            'intline' => 'required',
            'abot' => 'required|integer|min:0',
            'atop' => 'required|integer|min:0',
            'ainn' => 'required|integer|min:0',
            'apick' => 'required',

            'tbot' => 'required|integer|min:0',
            'ttop' => 'required|integer|min:0',
            'tinn' => 'required|integer|min:0',
            'miss' => 'required|integer|min:0',

            'woj1' => 'required',
            'woj2' => 'required',

            'defed' => 'required',
            'defing' => 'required',
            'hang' => 'required',
            'park' => 'required',
            'lvl' => 'required',
            'ascore' => 'required|integer|min:0',
            'justin' => 'required'
        ]);
    
        $dataEntry = DataEntry::create($data);
        
        // do check for justin
        return redirect()->route('scout.create')->with('success', 'Data submitted successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('scoutindex');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('scoutedit');
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
