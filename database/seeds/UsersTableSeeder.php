<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('users')->insert([
            'code' => Str::random(10),
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'login' => Str::random(10),
            'address' => Str::random(10),
            'tel' => Str::random(10),
            'cni' => Str::random(10),
            'role' => "Guichetier",
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
