<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'match_num', 'team_num', 'alliance', 'starting_point', 'driving_sandstorm_type', 'sand_rocket_hatches', 'sand_rocket_balls', 'sand_cargo_hatches',
        'sand_cargo_balls', 'rocket_hatches', 'rocket_balls', 'cargo_hatches',
        'cargo_balls', 'end_position', 'help', 'red_score', 'blue_score', 'end_score'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
