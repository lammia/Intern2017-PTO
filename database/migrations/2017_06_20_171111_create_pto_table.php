<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('pto_request', function (Blueprint $table) {
            $table->increments('rqid');
            $table->string('id')->nullable();
            $table->string('mgid')->nullable();
            $table->date('dateofrequest');
            $table->date('datestart');
            $table->date('dateend');
            $table->string('reason');
            $table->integer('approvalofmanager');
            $table->string('reasonforrejected')->nullable();
            $table->integer('approvalofadmin');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('mgid')->references('mgid')->on('managers');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pto_request');
    }
}
