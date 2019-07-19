<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_interview', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('tgl');
            $table->integer('id_lamaran')->unsigned();
            $table->foreign('id_lamaran')->references('id')->on('lamaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_interview');
    }
}
