<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kota_id');     
            $table->string('nama');
            $table->string('bintang');
            $table->string('rating')->default('0');
            $table->string('lokasi');
            $table->string('telp');
            $table->longText('gmaplink');
            $table->longText('deskripsi');
            $table->json('fasilitas');
            $table->json('images');
            $table->timestamps();

            $table->foreign('kota_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels', function(Blueprint $table){
            $table->dropForeign('kota_id'); 
            $table->dropColumn('hotels'); 
        });
    }
}
