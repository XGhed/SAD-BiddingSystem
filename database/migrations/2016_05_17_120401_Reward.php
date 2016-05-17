<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reward extends Migration
{
  
    public function up()
    {
        Schema::create('Reward', function (Blueprint $table){
            $table->increments('RewardID');
            $table->integer('RewardPercentage')->unsigned();
            $table->datetime('RewardDate');
        });
    }

    public function down()
    {
        //
    }
}
