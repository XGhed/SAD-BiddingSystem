<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvinceCompany extends Migration
{
    Schema::create('ProvinceCompany', function(Blueprint $table)
    {
        $table->primary(array('ProvinceID', 'CompanyID'));
        $table->integer('ProvinceID')->unsigned();
        $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
        $table->integer('CompanyID')->unsigned();
        $table->foreign('CompanyID')->references('CompanyID')->on('Delivery_Company');
    });
     public function down()
{

    Schema::drop('ProvinceThirdParty');
    
}
}
