<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah_m', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah')->nullable();
            $table->integer('npsn')->unique();
            $table->bigInteger('no_telp')->nullable();
            $table->string('kota')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->integer('kode_area')->nullable();
            $table->boolean('is_aktif')->nullable()->default(true);
            
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
        Schema::dropIfExists('sekolah_m');
    }
}
