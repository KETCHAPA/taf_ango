<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
            'code' => Str::random(10),
            'departure' => Str::random(10),
            'destination' => Str::random(10),
            'time' => Str::random(10),
            'date' => "2019-06-13",
            
        ]);
    }
}
