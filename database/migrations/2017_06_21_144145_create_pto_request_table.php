<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtoRequestTable extends Migration
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
            $table->string('enid')->nullable();
            $table->string('mgid')->nullable();
            $table->date('dateofrequest');
            $table->date('datestart');
            $table->date('dateend');
            $table->string('reason');
            $table->integer('approvalofmanager');
            $table->integer('approvalofadmin');
            $table->string('reasonforrejected')->nullable();
            $table->timestamps();
            $table->foreign('enid')->references('enid')->on('users');
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
