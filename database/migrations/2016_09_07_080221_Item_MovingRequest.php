<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemMovingRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Item_MovingRequest', function(Blueprint $table)
        {
            $table->increments('Item_MovingRequestID');
            $table->integer('ItemID')->unsigned();
            $table->integer('MovingRequestID')->unsigned();
            $table->foreign('ItemID')->references('ItemID')->on('Items');
            $table->foreign('MovingRequestID')->references('MovingRequestID')->on('MovingRequest');

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
