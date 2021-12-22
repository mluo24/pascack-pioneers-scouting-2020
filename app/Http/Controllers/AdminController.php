<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Data;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:update-settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSettings()
    {
    	$current = DB::table('competitions')->where('active', 1)->first();
    	$competitions = DB::table('competitions')->get();
        return view('settings', ['current' => $current, 'competitions' => $competitions] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeSettings(Request $request)
    {
        if (!is_null($request->input('competition'))) {
            $request->validate([
                'competition' => 'required',
            ]);
            DB::table('competitions')
            	->update(['active' => 0]);
            DB::table('competitions')
            	->where('slug', $request->input('competition'))
            	->update(['active' => 1]);
        }
        else if (!is_null($request->hasFile('csvfile'))) {
            $request->validate([
                'csvfile' => 'required|mimetypes:text/csv,text/plain',
            ]);

            $file = $request->file('csvfile');

            $fileContents = $file->get();

            $rows = preg_split('/\r\n|\r|\n/', $fileContents);
            foreach ($rows as $row) {
                $data = explode(",", $row);
                DB::table('match_schedule')->insert(
                    $d = ['match_num' => $data[0], 'red1' => $data[1], 'red2' => $data[2], 'red3' => $data[3], 'blue1' => $data[4], 'blue2' => $data[5], 'blue3' => $data[6], 'competition_id' => DB::table('competitions')->where('active', 1)->first()->id]
                );
            }

        }

        return redirect('/settings')->with('success', 'Settings changed successfully');
    }

    /** GET RID OF THIS
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addMatchInfo(Request $request)
    {
        return redirect('/settings')->with('success', 'Match info submitted successfully');
    }
}
