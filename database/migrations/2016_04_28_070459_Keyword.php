<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keyword extends Migration
{
    public function up()
{

    Schema::create('Keyword', function(Blueprint $table)
    {
        $table->increments('KeywordID');
        $table->string('KeywordName', 30);
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Keyword');
    
}
}
