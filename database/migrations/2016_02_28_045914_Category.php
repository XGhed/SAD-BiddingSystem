<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    public function up()
{

    Schema::create('Category', function(Blueprint $table)
    {
        $table->increments('CategoryID');
        $table->string('CategoryName', 30);
        $table->string('Description', 30);
        $table->boolean('Status');
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Category');
    
}
}
