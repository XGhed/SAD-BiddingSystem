<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountType extends Migration
{
    public function up()
{

    Schema::create('AccountType', function(Blueprint $table)
    {
        $table->increments('AccountTypeID');
        $table->string('AccountTypeName', 30);
        $table->string('Description', 30);
        $table->integer('TaxRate')->unsigned();
        $table->integer('Discount')->unsigned();
        $table->boolean('Status')->default(1);
        $table->softDeletes();
    });
}

public function down()
{

    Schema::drop('AccountType');
    
}
}
