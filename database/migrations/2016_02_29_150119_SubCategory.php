<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubCategory extends Migration
{
    public function up()
{

    Schema::create('SubCategory', function(Blueprint $table)
    {
        $table->increments('SubCategoryID');
        $table->string('SubCategoryName', 30);
        $table->string('Description', 30);
        $table->boolean('Status')->default(1);
        $table->softDeletes();
        $table->integer('CategoryID')->unsigned();
        $table->foreign('CategoryID')->references('CategoryID')->on('Category');
    });
}

public function down()
{

    Schema::drop('SubCategory');
    
}
}
