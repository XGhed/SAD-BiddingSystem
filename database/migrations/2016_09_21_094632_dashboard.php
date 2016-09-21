<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dashboard', function(Blueprint $table)
        {
            $table->increments('Company');
            $table->string('CompanyName', 30);
            $table->string('ComapanyAddress', 50);
            $table->string('CompanyEmail', 30);
            $table->String('CellphoneNo', 15);
            $table->string('valid_id');
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
