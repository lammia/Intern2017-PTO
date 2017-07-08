<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
       Schema::create('admins', function (Blueprint $table) {
         $table->string('adid');
         $table->string('fullname');
=======
        
        Schema::create('admins', function (Blueprint $table) {
         $table->string('adid');
>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
         $table->string('email')->unique();
         $table->string('password');
         $table->string('fullname');
         $table->rememberToken();
         $table->timestamps();
         $table->primary('adid');
     });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
