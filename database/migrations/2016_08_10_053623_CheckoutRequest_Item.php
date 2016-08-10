<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CheckoutRequestItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CheckoutRequest_Item', function(Blueprint $table)
        {
            $table->increments('CheckoutRequest_ItemID');
            $table->integer('CheckoutRequestID')->unsigned();
            $table->integer('ItemID')->unsigned();
            $table->date('RequestDate');
            $table->foreign('AccountID')->references('AccountID')->on('Account');
            $table->foreign('ItemID')->references('ItemID')->on('Items');

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
