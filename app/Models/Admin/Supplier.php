<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes;

    protected $table = 'Supplier';
    protected $primaryKey = 'SupplierID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function city()
	{
	    return $this->hasOne('App\Models\Admin\City', 'CityID', 'CityID');
	}
}
