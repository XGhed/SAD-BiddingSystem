<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'items';
    protected $primaryKey = 'ItemID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function subCategory()
	{
	    return $this->hasOne('App\SubCategory', 'CategoryID');
	}
}
