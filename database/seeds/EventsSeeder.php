<?php

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            ['name' => 'Mount Olive','slug' => '1', 'active' => 1],
            ['name' => 'Hudson Valley Regional','slug' => '2', 'active' => 0],
            ['name' => 'Montgomery','slug' => '3', 'active' => 0],
            ['name' => 'FMA Regional Championship','slug' => '4', 'active' => 0],
            ['name' => 'World Championship','slug' => '5', 'active' => 0]
        ]);
    }
}
