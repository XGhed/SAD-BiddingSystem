<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MovingRequest extends Model
{
    protected $table = 'MovingRequest';
    protected $primaryKey = 'MovingRequestID';
    public $timestamps = false;

    public function item_movingRequest()
	{
	    return $this->hasMany('App\Models\Admin\Item_MovingRequest', 'MovingRequestID', 'MovingRequestID');
	}
}
