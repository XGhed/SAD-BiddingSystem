<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
	use SoftDeletes;

    protected $table = 'warehouse';
    protected $primaryKey = 'WarehouseNo';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function city()
	{
	    return $this->hasOne('App\City', 'CityID', 'CityID');
	}
}
