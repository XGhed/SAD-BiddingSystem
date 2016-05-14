<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ItemModel extends Model
{
    use SoftDeletes;

    protected $table = 'itemmodels';
    protected $primaryKey = 'ItemModelID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function subCategory()
	{
	    return $this->hasOne('App\Models\Admin\SubCategory', 'SubCategoryID', 'SubCategoryID');
	}
}
