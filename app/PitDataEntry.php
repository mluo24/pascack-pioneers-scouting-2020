<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PitDataEntry extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['uid', 'event', 'teamid', 'chassis_drive', 'two_speeds', 'weight', 'num_motors', 'type_motors', 
        'num_wheels', 'type_wheels', 'fit_trench', 'wheel', 'what_goal', 'can_climb',
         'move_bar', 'other'];

    public function user() {
    	return $this->belongsTo('App\User', 'uid');
    }

    public static function returnYesNo($bin) {
        return $bin ? "yes" : "no";
    }

}
