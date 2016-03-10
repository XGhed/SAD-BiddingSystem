<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    public function up()
{

    Schema::create('Items', function(Blueprint $table)
    {
        $table->increments('ItemID');
        $table->string('ItemName', 30);
        $table->boolean('Status')->default(1);
        $table->integer('SubCategoryID')->unsigned();
        $table->foreign('SubCategoryID')->references('SubCategoryID')->on('SubCategory');
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Items');
    
}
}
