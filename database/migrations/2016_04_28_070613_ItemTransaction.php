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
            $table->integer('ContainerID')->unsigned();
            $table->string('DefectDescription', 50);
            $table->string('status', 30);
            $table->string('size');
            $table->string('color');
            $table->string('image_path');
            $table->datetime('TransacDate');
            $table->integer('ItemModelID')->unsigned();
            $table->foreign('ContainerID')->references('ContainerID')->on('Containers');
            $table->foreign('ItemModelID')->references('ItemModelID')->on('ItemModels');
            $table->softDeletes();
        });
    }
    public function down()
    {
        schema::drop('Items');
    }
}
