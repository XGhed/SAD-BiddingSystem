<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Item_MovingRequest extends Model
{
    protected $table = 'Item_MovingRequest';
    protected $primaryKey = 'Item_MovingRequestID';
    public $timestamps = false;

    public function item()
	{
	    return $this->hasOne('App\Models\Admin\Item', 'ItemID', 'ItemID');
	}

	public function movingRequest()
	{
	    return $this->hasOne('App\Models\Admin\MovingRequest', 'MovingRequestID', 'MovingRequestID');
	}
}
