<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ItemHistory', function (Blueprint $table){
            $table->increments('ItemHistoryID');
            $table->integer('ItemID')->unsigned();
            $table->string('Log', 150);
            $table->datetime('Date');
            $table->foreign('ItemID')->references('ItemID')->on('items');
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
