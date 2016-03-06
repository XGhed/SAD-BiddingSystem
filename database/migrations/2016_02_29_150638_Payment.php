<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payment extends Migration
{
    public function up()
{
Schema::create('Payment', function(Blueprint $table)
    {
        $table->increments('PaymentID');
        $table->decimal('TotalPrice', 8, 2);
        $table->string('DeliveryAddress_Province',30);
        $table->string('DeliveryAddress_City',30);
        $table->string('DeliveryAddress_Street_Brgy',30);
        $table->dateTime('PaymentDate');
        $table->integer('ModeOfPaymentTypeID')->unsigned();
        $table->integer('AccountID')->unsigned();
        $table->integer('ClaimTypeID')->unsigned();
        $table->foreign('ModeOfPaymentTypeID')->references('PaymentTypeID')->on('ModeOfPaymentType');
        $table->foreign('AccountID')->references('AccountID')->on('Account');
        $table->foreign('ClaimTypeID')->references('ClaimTypeID')->on('ClaimType');
    });
}

public function down()
{

    Schema::drop('Payment');
    
}
}
