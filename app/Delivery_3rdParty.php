<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery_3rdParty extends Model
{
    use SoftDeletes;

    protected $table = 'delivery_thirdparty';
    protected $primaryKey = 'PartyID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
