<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Membership extends Migration
{
    public function up()
{

    Schema::create('Membership', function(Blueprint $table)
    {
            $table->increments('MembershipID');
            $table->string('FirstName', 30);
            $table->string('MiddleName', 30)->nullable();
            $table->string('LastName', 30);
            $table->string('Barangay_Street_Address', 50);
            $table->date('Birthdate');
            $table->String('Occupation', 30);
            $table->string('Gender', 10);
            $table->String('CellphoneNo', 15);
            $table->String('Landline', 10)->nullable();
            $table->String('EmailAdd', 30);
            $table->date('DateOfRegistration');
            $table->integer('RegionID')->unsigned();
            $table->foreign('RegionID')->references('RegionID')->on('Region');
        
    });
}

public function down()
{

    Schema::drop('Membership');
    
}
}
