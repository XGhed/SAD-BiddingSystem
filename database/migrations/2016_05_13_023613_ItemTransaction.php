<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTransaction extends Migration
{
    public function up()
    {
        schema::create('ItemTransaction', function(Blueprint $table)
        {
            $table->increments('ItemTransacNo');
            $table->string('DefectDescription', 50);
            $table->string('status', 30);
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('image_path');
            $table->string('image_type');
            $table->integer('price');
            $table->datetime('TransacDate');
            $table->integer('ItemID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }
    public function down()
    {
        schema::drop('ItemTransaction');
    }
}
