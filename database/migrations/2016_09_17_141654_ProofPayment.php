<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProofPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProofPayments', function(Blueprint $table)
        {
            $table->increments('ProofPaymentID');
            $table->integer('CheckoutRequestID')->unsigned();
            $table->string('image_path');
            $table->foreign('CheckoutRequestID')->references('CheckoutRequestID')->on('CheckoutRequests');

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
