<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('team')->insert([
        'teamid'=>'T001',
        'teamname'=>'Drift'
        ]);
	   
        DB::table('team')->insert([
        'teamid'=>'T002',
        'teamname'=>'LacTroi'
        ]);

        DB::table('team')->insert([
        'teamid'=>'T003',
        'teamname'=>'ConGa'
        ]);

        DB::table('team')->insert([
        'teamid'=>'T004',
        'teamname'=>'ConVit'
        ]);
    }
}
