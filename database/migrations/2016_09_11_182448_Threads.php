<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Threads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Threads', function(Blueprint $table)
        {
            $table->increments('ThreadID');
            $table->integer('ProblemTypeID')->unsigned()->nullable()->default(null);
            $table->string('Subject');
            $table->foreign('ProblemTypeID')->references('ProblemTypeID')->on('ProblemTypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
