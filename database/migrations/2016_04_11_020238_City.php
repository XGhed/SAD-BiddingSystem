<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class City extends Migration
{
    public function up(){
        Schema::create('City', function(Blueprint $table){
            $table->increments('CityID');
            $table->string('CityName', 30);
            $table->integer('ProvinceID')->unsigned();
            $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
        });
    }
    public function down(){
        Schema::drop('City');
    }
}
