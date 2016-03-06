<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModeOfPaymentType extends Migration
{
    public function up()
{

    Schema::create('ModeOfPaymentType', function(Blueprint $table)
    {
        $table->increments('PaymentTypeID');
        $table->string('PaymentTypeName', 30);
        $table->string('Description');
        $table->string('Note');
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('ModeOfPaymentType');
    
}
}
