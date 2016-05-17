<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'items';
    protected $primaryKey = 'ItemID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function itemModel()
	{
	    return $this->hasOne('App\Models\Admin\itemModel', 'ItemModelID', 'ItemModelID');
	}

	public function inventory()
	{
	    return $this->hasMany('App\Models\Admin\Inventory', 'ItemID', 'ItemID');
	}
}
