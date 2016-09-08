<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemDefect extends Migration
{
    public function up()
    {
        schema::create('ItemDefects', function(Blueprint $table)
        {
            $table->increments('ItemDefectID');
            $table->string('DefectName', 50);
            $table->boolean('Status')->default(1);
            $table->softDeletes();
        });
    }
    public function down()
    {
        schema::drop('ItemDefects');
    }
}
