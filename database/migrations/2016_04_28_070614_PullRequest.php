<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PullRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('PullRequests', function(Blueprint $table)
        {
            $table->increments('PullRequestID');
            $table->integer('ItemID')->unsigned();
            $table->datetime('RequestDate');
            $table->foreign('ItemID')->references('ItemID')->on('Items');
            $table->softDeletes();
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
