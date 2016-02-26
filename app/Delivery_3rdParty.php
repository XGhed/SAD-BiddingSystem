<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery_3rdParty extends Model
{
    use SoftDeletes;

    protected $table = 'delivery_3rdparty';
    protected $primaryKey = '3rdPartyID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
