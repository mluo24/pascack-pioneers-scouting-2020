<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index() {
    	$this->authorize("browse_admin");
    	$current = DB::table('events')->where('active', 1)->first();
    	$events = DB::table('events')->get();
        return view('settings', ['current' => $current, 'events' => $events] );
    	// return view('settings');
    }
    
    public function setSessionVariables(Request $request) {
        
        $request->session()->put('event', $request->input('event'));
        if ($request->has('alliance')) {
            $request->session()->put('alliance', $request->input('alliance'));
            $request->session()->put('inputtype', $request->input('inputtype'));
            $request->session()->put('orientation', $request->input('orientation'));
        }
        
        if ($request->ajax()) {
            return response()->json(['success'=>'Settings set successfully', 'event' => DB::table('events')->find($request->input('event'))->name]);
        }
        else {
            return redirect()->route('home')->with('success', 'Settings set successfully');
        }
    }

    public function changeSettings(Request $request)
    {
    	$this->authorize("browse_admin");
        if (!is_null($request->input('event'))) {
            $request->validate([
                'event' => 'required',
            ]);
            DB::table('events')
            	->update(['active' => 0]);
            DB::table('events')
            	->where('id', $request->input('event'))
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
                    ['event' => DB::table('events')->where('active', 1)->first()->id, 'match' => $data[0], 'red1' => $data[1], 'red2' => $data[2], 'red3' => $data[3], 'blue1' => $data[4], 'blue2' => $data[5], 'blue3' => $data[6]]
                );
            }
            
        }
        
        return redirect()->route('settings')->with('success', 'Settings changed successfully');
    }

}
