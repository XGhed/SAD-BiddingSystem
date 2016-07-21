<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Winners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Winners', function(Blueprint $table)
        {
            $table->increments('WinnerID');
            $table->integer('ItemID')->unsigned();
            $table->integer('AccountID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Item');
            $table->foreign('AccountID')->references('AccountID')->on('Account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
