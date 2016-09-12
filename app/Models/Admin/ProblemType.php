<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProblemType extends Model
{
    protected $table = 'ProblemTypes';
    protected $primaryKey = 'ProblemTypeID';
    public $timestamps = false;

    public function Item()
	{
	    return $this->hasMany('App\Models\Admin\Thread', 'ProblemTypeID');
	}
}
