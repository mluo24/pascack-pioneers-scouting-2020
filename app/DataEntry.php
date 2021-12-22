<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\User;

class DataEntry extends Model
{
	// please add more to this mess

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'uid',
        'event',
        'match',
        'teamid',
        'alliance',
        'startl',
        'intline',
        'abot',
        'atop',
        'ainn',
        'apick',
        
        'tbot',
        'ttop',
        'tinn',
        'miss',
        
        'woj1',
        'woj2',
        
        'defed',
        'defing',
        'hang',
        'park',
        'lvl',
        'ascore',
        
        'justin',
    ];
    protected $casts = [
        'uid' => 'integer',
        'event' => 'integer',
        'match' => 'integer',
        'alliance' => 'integer',
        'startl' => 'integer',
        'intline' => 'integer', // boolean
        'abot' => 'integer',
        'atop' => 'integer',
        'ainn' => 'integer',
        'apick' => 'integer',  // boolean
        
        'tbot' => 'integer',
        'ttop' => 'integer',
        'tinn' => 'integer',
        'miss' => 'integer',
        
        'woj1' => 'integer',  // boolean
        'woj2' => 'integer',  // boolean
        
        'defed' => 'integer',  // boolean
        'defing' => 'integer',  // boolean
        'hang' => 'integer',  // boolean
        'park' => 'integer',  // boolean
        'lvl' => 'integer',  // boolean
        'ascore' => 'integer',
        'justin' => 'boolean',
    ];

    protected $attributedVals;

    // public function __construct()
    // {
    //     $this->attributedVals = [
    //         'uid' => User::find($this->uid),
    //         'event' => DB::table('events')->find($this->event),
    //         'alliance' => $this->returnAlliance($this->alliance),
    //         'startl' => $this->returnStarting($this->startl), 
    //         'intline' => $this->returnYesNo($this->intline), // boolean
    //         'apick' => $this->returnYesNo($this->apick),  // boolean
            
    //         'woj1' => $this->returnYesNo($this->woj1),  // boolean
    //         'woj2' => $this->returnYesNo($this->woj2),  // boolean
            
    //         'defed' => $this->returnYesNo($this->defed),  // boolean
    //         'defing' => $this->returnYesNo($this->defing),  // boolean
    //         'hang' => $this->returnYesNo($this->hang),  // boolean
    //         'park' => $this->returnYesNo($this->park),  // boolean
    //         'lvl' => $this->returnYesNo($this->lvl),  // boolean
    //     ];
    // }

    public function user() {
        return $this->belongsTo('App\User', 'uid');
    }

    public static function returnAlliance($id) {
        return $id == 1 ? "red" : "blue";
    }

    public static function returnStarting($id) {
        switch ($id) {
            case 1:
                return "closest";
                break;
            case 2:
                return "middle";
                break;
            case 3:
                return "farthest";
                break;
            default:
                return null;
                break;
        }
    }

    public static function returnYesNo($bin) {
        return $bin ? "yes" : "no";
    }

    /**
     * Calculates and returns all the shots taken by the robot.
     *
     * @return integer
     */
    public function getTshotsAttribute() {
        return $this->abot + $this->atop + $this->ainn + $this->tbot + $this->ttop + $this->tinn + $this->miss;
    }

    /**
     * Calculates and returns the proportion of successful shots of the robot.
     *
     * @return integer
     */
    public function getAccAttribute() {
    	if ($this->getTshotsAttribute() != 0) {
    		return (1 - ($this->miss / $this->getTshotsAttribute()));
    	}
    	return 0;
    }

    /**
     * Calculates and returns the total score attributed to shooting ball.
     *
     * @return integer
     */
    public function getTballAttribute() {
    	return 2 * ($this->abot) + 4 * ($this->atop) + 6 * ($this->ainn) 
    		+ 1 * ($this->tbot) + 2 * ($this->ttop) + 3 * ($this->tinn);
    }

    /**
     * Calculates and returns the total score based all on fields.
     *
     * @return integer
     */
    public function getCalculatedScoreAttribute() {
    	return 5 * ($this->intline) + $this->getTballAttribute() + 10 * ($this->woj1) + 20 * ($this->woj2) 
    		+ 25 * ($this->hang) + 5 * ($this->park)+ 15 * ($this->lvl);
    }

}
