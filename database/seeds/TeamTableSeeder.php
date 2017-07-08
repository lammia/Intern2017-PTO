<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
        'TeamId'=>'T001',
        'TeamName'=>'Drifting'
        ]);
    }
}
