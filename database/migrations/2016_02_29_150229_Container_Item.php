<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContainerItem extends Migration
{
    public function up()
{

    Schema::create('Container_Item', function(Blueprint $table)
    {
        $table->primary(array('ContainerID','ItemID'));
        $table->string('Description', 30);
        $table->string('Size', 20);
        $table->string('Color', 20);
        $table->integer('ContainerID')->unsigned();
        $table->integer('ItemID')->unsigned();
        $table->foreign('ContainerID')->references('ContainerID')->on('Container');
        $table->foreign('ItemID')->references('ItemID')->on('Items');
    });
}

public function down()
{

    Schema::drop('Container_Item');
    
}
}
