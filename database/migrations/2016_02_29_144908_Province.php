<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Province extends Migration
{
    public function up()
{
    Schema::create('Province', function(Blueprint $table)
    {
            $table->increments('ProvinceID');
            $table->string('ProvinceName', 30);
        });
    }
    public function down(){
        Schema::drop('Province');
    }
}
