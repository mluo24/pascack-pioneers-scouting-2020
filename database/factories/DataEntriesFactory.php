<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DataEntry;
use Faker\Generator as Faker;

$factory->define(DataEntry::class, function (Faker $faker) {
    return [
        'uid' => $faker->numberBetween(1, 1),
        'event' => $faker->numberBetween(1, 1),
        'match' => $faker->numberBetween(1, 1),
        'teamid' => $faker->numberBetween(1, 8000),
        'alliance' => $faker->numberBetween(1, 2),
        'startl' => $faker->numberBetween(1, 3),
        'intline' => $faker->numberBetween(0, 1), // boolean
        'abot' => $faker->randomNumber(2),
        'atop' => $faker->randomNumber(2),
        'ainn' => $faker->randomNumber(2),
        'apick' => $faker->numberBetween(0, 1),  // boolean
        
        'tbot' => $faker->randomNumber(2),
        'ttop' => $faker->randomNumber(2),
        'tinn' => $faker->randomNumber(2),
        'miss' => $faker->randomNumber(2),
        
        'woj1' => $faker->numberBetween(0, 1),  // boolean
        'woj2' => $faker->numberBetween(0, 1),  // boolean
        
        'defed' => $faker->numberBetween(0, 1),  // boolean
        'defing' => $faker->numberBetween(0, 1),  // boolean
        'hang' => $faker->numberBetween(0, 1),  // boolean
        'park' => $faker->numberBetween(0, 1),  // boolean
        'lvl' => $faker->numberBetween(0, 1),  // boolean
        'ascore' => $faker->numberBetween(0, 0),
        'justin' => $faker->numberBetween(0, 0),
    ];
});
