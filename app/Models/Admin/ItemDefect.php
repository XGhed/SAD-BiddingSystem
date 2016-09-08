<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ItemDefect extends Model
{
    protected $table = 'ItemDefects';
    protected $primaryKey = 'ItemDefectID';
    public $timestamps = false;

    public function item()
	{
	    return $this->hasMany('App\Models\Admin\Item', 'ItemDefectID', 'ItemDefectID');
	}
}
