<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemMaintenance extends Migration
{
    
    public function up()
    {
        schema::create('ItemMaintenance', function(Blueprint $table){
            $table->increments('ItemMainteID');
            $table->string('image_path');
            $table->string('dimensions');
            $table->string('color');
            $table->integer('ItemID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

    public function down()
    {
        schema::drop('ItemMaintenance');
    }
}
