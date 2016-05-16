<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reward extends Migration
{
   
    public function up()
    {
        schema::create('Reward', function (Blueprint $table){
            $table->increments('RewardID');
            $table->string('PriceRange');
            $table->string('Percentage');
            $table->integer('Points')->unsigned();
        });
    }

  
    public function down()
    {
        schema::drop('Reward');
    }
}
