<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'Category';
    protected $primaryKey = 'CategoryID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function subCategory()
	{
	    return $this->hasMany('App\Models\Admin\SubCategory', 'CategoryID');
	}
}//ALTER TABLE `category` ADD `deleted_at` DATETIME NULL DEFAULT NULL
