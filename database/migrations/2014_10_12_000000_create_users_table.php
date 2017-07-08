<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
      Schema::create('users', function (Blueprint $table) {
            $table->string('enid');
            $table->string('fullname');
=======
        /*Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('dayleft');
            $table->string('teamid');
            $table->foreign('teamid')->references('teamid')->on('team');

            $table->rememberToken();
            $table->timestamps();
<<<<<<< HEAD
            $table->primary('enid');
       });

=======
        });
       */ 

        Schema::create('users', function (Blueprint $table) {
            $table->string('id');
            $table->string('teamid');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->string('dayleft');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
            $table->foreign('teamid')->references('teamid')->on('team');
        });
    
>>>>>>> aaf2788ab06e36d4b1fbae2f150c9faa2cbe7b50
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
