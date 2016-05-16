<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Discount extends Migration
{
   
    public function up()
    {
        Schema::create('Discount', function (Blueprint $table){
            $table->increments('DiscountID');
            $table->integer('RequiredPoints')->unsigned();
            $table->integer('Discount')->unsigned();
            $table->integer('AccountTypeID')->unsigned();
            $table->foreign('AccountTypeID')->references('AccountTypeID')->on('AccountType');
        });
    }

    public function down()
    {
        Schema::drop('Discount');
    }
}
