<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ratings extends Migration
{
    public function up()
{

    Schema::create('Ratings', function(Blueprint $table)
    {
        $table->increments('RatingID');
        $table->string('Rate', 30);
        $table->integer('ItemID')->unsigned();
        $table->foreign('ItemID')->references('ItemID')->on('Items');
    });
}

public function down()
{

    Schema::drop('Ratings');
    
}
}
