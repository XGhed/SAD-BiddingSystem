<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliveryCompany extends Migration
{
    public function up()
{

    Schema::create('Delivery_Company', function(Blueprint $table)
    {
        $table->increments('CompanyID');
    });
}

public function down()
{

    Schema::drop('Delivery_Company');
    
}
}
