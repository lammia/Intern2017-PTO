<?php

use Illuminate\Database\Seeder;

class PTORequestTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pto_request')->insert([
            'MgId'=>'M001',
            'DateOfRequest'=>'2017-07-01',
            'DateStart'=>'2017-07-02',
            'DateEnd'=>'2017-07-03',
            'Reason'=>'Sick',
            'ApprovalOfManager'=>'0',
            'ApprovalOfAdmin'=>'0'
        ]);
    }
}
