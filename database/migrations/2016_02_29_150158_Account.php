<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Account extends Migration
{
    public function up()
{

    Schema::create('Account', function(Blueprint $table)
    {
        $table->increments('AccountID');
        $table->string('Account_Fname', 30);
        $table->string('Account_Mname', 30)->nullable();
        $table->string('Account_Lname', 30);
        $table->string('Barangay_Street_Address', 50);
        $table->date('AccountBirthdate', 30);
        $table->String('Account_Occupation', 30);
        $table->tinyInteger('Account_Gender');
        $table->String('Account_ContactNo', 15);
        $table->String('Account_EmailAdd', 30);
        $table->String('Username', 30);
        $table->String('Password', 15);
        $table->integer('CityID')->unsigned();
        $table->foreign('CityID')->references('CityID')->on('City');
        $table->integer('AccountTypeID')->unsigned();
        $table->foreign('AccountTypeID')->references('AccountTypeID')->on('AccountType');
    });
}

public function down()
{

    Schema::drop('Account');
    
}
}
