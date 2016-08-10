<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CheckoutRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CheckoutRequests', function(Blueprint $table)
        {
            $table->increments('CheckoutRequestID');
            $table->integer('AccountID')->unsigned();
            $table->date('RequestDate');
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
