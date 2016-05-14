<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTransaction extends Migration
{
    public function up()
    {
        schema::create('Items', function(Blueprint $table)
        {
            $table->increments('ItemID');
            $table->string('DefectDescription', 50);
            $table->string('status', 30);
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('image_path');
            $table->datetime('TransacDate');
            $table->integer('ItemModelID')->unsigned();
            $table->foreign('ItemModelID')->references('ItemModelID')->on('ItemModels');
        });
    }
    public function down()
    {
        schema::drop('Items');
    }
}
