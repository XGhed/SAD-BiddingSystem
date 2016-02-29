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
        $table->string('Account_Province_Address', 30);
        $table->string('Account_Barangay_Address', 30);
        $table->string('Account_Street_Address', 30);
        $table->string('Account_City_Address', 30);
        $table->dateTime('AccountBirthdate', 30);
        $table->String('Account_Occupation', 30);
        $table->String('Account_Gender', 30);
        $table->String('Account_ContactNo', 15);
        $table->String('Account_EmailAdd', 30);
        $table->String('Username', 30);
        $table->String('Password', 30);
        $table->integer('AccountTypeID')->unsigned();
        $table->foreign('AccountTypeID')->references('AccountTypeID')->on('AccountType');
    });
}

public function down()
{

    Schema::drop('Account');
    
}
}
