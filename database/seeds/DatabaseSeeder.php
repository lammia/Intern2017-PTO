
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
         //$this->call(AdminsTableSeeder::class);
         //$this->call(ManagersTableSeeder::class);
         $this->call(PTORequestTable::class);
       // $this->call(TeamTableSeeder::class);
     //   $this->call(RequestPTOTableSeeder::class);
      
        // DB::table('users')->insert([
        //     'EnId'=>'E001',
        //     'FullName'=>'kun',
        //     'Email'=>'ndat905@gmail.com',
        //     'Password'=>bcrypt('12345678'),
        //     'TeamId'=>'T001',
        //     'DayLeft'=>'6',
        // ]);
        
=======
      // $this->call(TeamSeeder::class); 
        $this->call(PtoTableSeeder::class);
      //   $this->call(AdminsTableSeeder::class);
      //  $this->call(ManagersTableSeeder::class);
       /*
        DB::table('users')->insert([
        'id'=>'E001',
        'teamid'=>'T001',
        'email'=>'ndat905@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'kun',
        'dayleft'=>'10'
        ]);
    
        DB::table('users')->insert([
        'id'=>'E002',
        'teamid'=>'T001',
        'email'=>'hanley905@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'hien',
        'dayleft'=>'5'
        ]);

        DB::table('users')->insert([
        'id'=>'E003',
        'teamid'=>'T001',
        'email'=>'ken905@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'kien',
        'dayleft'=>'9'
        ]);

        DB::table('users')->insert([
        'id'=>'E004',
        'teamid'=>'T002',
        'email'=>'team21@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'hoa',
        'dayleft'=>'5'
        ]);

        DB::table('users')->insert([
        'id'=>'E005',
        'teamid'=>'T002',
        'email'=>'team22@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'hanh',
        'dayleft'=>'12'
        ]);

        DB::table('users')->insert([
        'id'=>'E006',
        'teamid'=>'T002',
        'email'=>'team23@gmail.com',
        'password'=>bcrypt('12345678'),
        'fullname'=>'nhu',
        'dayleft'=>'3'
        ]);

     */   
>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
        

        
    }
    

     
}
