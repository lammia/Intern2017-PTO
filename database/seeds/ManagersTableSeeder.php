<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('managers')->insert([
<<<<<<< HEAD
            'MgId'=>'M001',
            'FullName'=>'Lauren',
            'Email'=>'Lauren@gmail.com',
            'Password'=>bcrypt('12345678'),
            'TeamId'=>'T001',
            'DayLeft'=>'5'
        ]);
        // DB::table('managers')->insert([
        // 'name'=>'Kenny',
        // 'email'=>'Kenny@gmail.com',
        // 'password'=>bcrypt('12345678'),
        // 'team'=>'3'
        // ]);
=======
        'mgid'=>'M001',
        'teamid'=>'T001',
        'email'=>'Lauren@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'Lauren',
        'dayleft'=>'5'
        ]);

       
       DB::table('managers')->insert([
        'mgid'=>'M002',
        'teamid'=>'T002',
        'email'=>'Top@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'Long',
        'dayleft'=>'4'
        ]);

       DB::table('managers')->insert([
        'mgid'=>'M003',
        'teamid'=>'T003',
        'email'=>'Kun@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'Dat',
        'dayleft'=>'6'
        ]);

       DB::table('managers')->insert([
        'mgid'=>'M004',
        'teamid'=>'T004',
        'email'=>'Ken@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'Kien',
        'dayleft'=>'3'
        ]);

>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
    }
}
