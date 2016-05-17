<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'InventoryNo';
    public $timestamps = false;

    public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}

	public function warehouse()
	{
	    return $this->hasOne('App\Models\Admin\Warehouse', 'WarehouseNo', 'WarehouseNo');
	}
}
