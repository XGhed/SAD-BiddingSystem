<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Region extends Migration
{
    public function up()
{
    Schema::create('Region', function(Blueprint $table)
    {
            $table->increments('RegionID');
            $table->string('RegionName', 30);
    });
}
    public function down()
    {
        Schema::drop('Region');
    }
}
