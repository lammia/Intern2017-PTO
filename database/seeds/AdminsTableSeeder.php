<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
<<<<<<< HEAD
            'AdId'=>'A001',
            'Fullname'=>'Lammia',
            'Email'=>'lammia@gmail.com',
            'Password'=>bcrypt('12345678')
=======
        'adid'=>'A001',
        'email'=>'ndat04080@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'Dat'
>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
        ]);
    }
}
