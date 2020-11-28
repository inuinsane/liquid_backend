<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('code'); 
            $table->integer('id_penilai');
            $table->string('kelebihan')->nullable();
            $table->text('catatan_kelebihan')->nullable();
            $table->string('kekurangan')->nullable();
            $table->text('catatan_kekurangan')->nullable();
            $table->text('saran')->nullable();
            $table->text('harapan')->nullable();
            $table->string('tiga_kata')->nullable();
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
        Schema::dropIfExists('penilaian');
    }
}
