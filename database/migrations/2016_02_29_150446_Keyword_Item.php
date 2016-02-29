<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeywordItem extends Migration
{
    public function up()
{

    Schema::create('Keyword_Item', function(Blueprint $table)
    {
        $table->primary(array('KeywordID','ItemID'));
        $table->integer('ItemID')->unsigned();
        $table->integer('KeywordID')->unsigned();
        $table->foreign('ItemID')->references('ItemID')->on('Items');
        $table->foreign('KeywordID')->references('KeywordID')->on('Keyword');
    });
}

public function down()
{

    Schema::drop('Keyword_Item');
    
}
}
