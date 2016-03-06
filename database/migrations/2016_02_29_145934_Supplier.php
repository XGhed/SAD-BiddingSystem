<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supplier extends Migration
{
    public function up()
{

    Schema::create('Supplier', function(Blueprint $table)
    {
        $table->increments('SupplierID');
        $table->string('SupplierName', 30);
        $table->string('Barangay_Street_Address', 30);
        $table->string('SupplierEmail', 30);
        $table->string('SupplierContactNo', 11);
        $table->boolean('Status')->default(1);
        $table->integer('CityID')->unsigned();
        $table->foreign('CityID')->references('CityID')->on('City');
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Supplier');
    
}
}
