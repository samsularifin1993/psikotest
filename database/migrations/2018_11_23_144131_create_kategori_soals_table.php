<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_soals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori');
            $table->integer('durasi')->unsigned();
            $table->dateTime('waktu_mulai')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('waktu_selesai')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('kategori_soals');
    }
}
