<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    protected $table = 'Shipment';
    protected $primaryKey = 'ShipmentID';
    public $timestamps = false;

    public function province()
	{
	    return $this->hasOne('App\Models\Admin\Province', 'ProvinceID', 'ProvinceID');
	}
}
