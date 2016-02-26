<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $table = 'subcategory';
    protected $primaryKey = 'SubCategoryID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}//ALTER TABLE `category` ADD `deleted_at` DATETIME NULL DEFAULT NULL
