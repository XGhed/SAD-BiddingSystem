<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvinceCompany extends Migration
{
     public function up()
{

    Schema::create('ProvinceCompany', function(Blueprint $table)
    {
        $table->primary(array('ProvinceID','CompanyID'));
        $table->integer('CompanyID')->unsigned();
        $table->integer('ProvinceID')->unsigned();
        $table->foreign('CompanyID')->references('CompanyID')->on('Delivery_Company');
        $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
    });
}

public function down()
{

    Schema::drop('ProvinceCompany');
    
}
}
