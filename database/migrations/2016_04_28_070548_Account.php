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
        $table->String('Username', 30);
        $table->String('Password', 15);
        $table->integer('AccountTypeID')->unsigned();
        $table->foreign('AccountTypeID')->references('AccountTypeID')->on('AccountType');
    });
}

public function down()
{

    Schema::drop('Account');
    
}
}
