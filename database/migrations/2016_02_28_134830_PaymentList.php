<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentList extends Migration
{
    public function up()
{

    Schema::create('PaymentList', function(Blueprint $table)
    {
        $table->primary(array('PaymentID','BidID'));
        $table->integer('paymentID')->unsigned();
        $table->integer('BidID')->unsigned();
        $table->foreign('PaymentID')->references('PaymentID')->on('Payment');
        $table->foreign('BidID')->references('BidID')->on('Bid');
    });
}

public function down()
{

    Schema::drop('PaymentList');
    
}
}
