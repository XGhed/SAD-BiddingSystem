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
        $table->string('Province_Address', 30);
        $table->string('Barangay_Address', 30);
        $table->string('Street_Address', 30);
        $table->string('City_Address', 30);
        $table->string('SupplierEmail', 30);
        $table->string('SupplierContactNo', 30);
        $table->boolean('Status')->default(1);
        $table->integer('ProvinceID')->unsigned();
        $table->foreign('ProvinceID')->references('ProvinceID')->on('Province');
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('Supplier');
    
}
}
