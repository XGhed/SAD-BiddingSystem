<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Messages', function(Blueprint $table)
        {
            $table->increments('MessageID');
            $table->integer('ThreadID')->unsigned();
            $table->datetime('DateAndTime');
            $table->string('Sender');
            $table->string('Message');
            $table->foreign('ThreadID')->references('ThreadID')->on('Threads');

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
