<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemTransac extends Migration
{
    public function up()
    {
        schema::create('ItemTransac', function(Blueprint $table)
        {
            $table->increments('ItemTransacNo');
            $table->string('DefectDescription', 50);
            $table->string('status', 30);
            $table->integer('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('image_path');
            $table->integer('price');
            $table->datetime('TransacDate');
        });
    }
    public function down()
    {

    }
}
