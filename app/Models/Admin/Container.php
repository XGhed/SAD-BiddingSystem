<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $table = 'Containers';
    protected $primaryKey = 'ContainerID';
    public $timestamps = false;

    public function Item()
	{
	    return $this->hasMany('App\Models\Admin\Item', 'ContainerID');
	}

	public function Supplier()
	{
	    return $this->hasOne('App\Models\Admin\Supplier', 'SupplierID', 'SupplierID');
	}

	public function warehouse()
	{
	    return $this->hasOne('App\Models\Admin\Warehouse', 'WarehouseNo', 'WarehouseNo');
	}
}
