<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeywordItem extends Migration
{

    public function up()
    {
        Schema::create('KeywordItem', function (Blueprint $table){
            $table->primary(array('KeywordID','ItemID'));
            $table->integer('KeywordID')->unsigned();
            $table->integer('ItemID')->unsigned();
            $table->foreign('KeywordID')->references('KeywordID')->on('Keyword');
            $table->foreign('ItemID')->references('ItemID')->on('Items');
        });
    }

    public function down()
    {
        Schema::drop('KeywordItem');
    }
}
