<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlacesTable extends Migration
{
   public function up()
{

    Schema::create('PlacesTable', function(Blueprint $table)
    {
        $table->increments('PlaceID');
        $table->string('PlaceName', 30);
        $table->string('DeliveryDays', 30);
        $table->string('Restrict_Status', 30);
    });
}

public function down()
{

    Schema::drop('PlacesTable');
    
}
}
