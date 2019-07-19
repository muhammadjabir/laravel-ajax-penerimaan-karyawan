<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_karyawan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nik',14);
            $table->string('nama',40);
            $table->string('email',40);
            $table->string('nohp',13);
            $table->date('tgl_lahir');
            $table->string('berkas');  
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
        Schema::dropIfExists('calon_karyawan');
    }
}
