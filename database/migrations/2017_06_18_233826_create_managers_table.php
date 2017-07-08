<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('managers', function (Blueprint $table) {
         $table->string('mgid');
<<<<<<< HEAD
         $table->string('fullname');
         $table->string('email')->unique();
         $table->string('password');
         $table->string('teamid');
         $table->foreign('teamid')->references('teamid')->on('team');
         $table->integer('dayleft');
         $table->rememberToken();
         $table->timestamps();
         $table->primary('mgid');
       });
=======
         $table->string('teamid');
         $table->string('email')->unique();
         $table->string('password');
         $table->string('fullname');
         $table->string('dayleft');
         $table->rememberToken();
         $table->timestamps();
         $table->primary('mgid');
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
        Schema::dropIfExists('managers');
    }
}
