<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id');            
            $table->string('nama');
            $table->integer('max_capacity');
            $table->integer('price');
            $table->string('tamu');
            $table->string('luas');
            $table->json('fasilitas');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms', function(Blueprint $table){
            $table->dropForeign('hotel_id'); 
            $table->dropColumn('rooms'); 
        });
    }
}
