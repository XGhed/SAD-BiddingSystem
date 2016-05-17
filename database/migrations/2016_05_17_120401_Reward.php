<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reward extends Migration
{
  
    public function up()
    {
        Schema::create('Reward', function (Blueprint $table){
            $table->integer('RewardID')->unsigned();
            $table->integer('RewardPercent')->unsigned();
        });
    }

    public function down()
    {
        //
    }
}
