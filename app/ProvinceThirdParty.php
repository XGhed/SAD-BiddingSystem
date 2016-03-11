<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceThirdParty extends Model
{
    protected $table = 'provincethirdparty';
    protected $primaryKey = 'PartyID';
    public $timestamps = false;

    public function province()
	{
	    return $this->hasOne('App\Province', 'ProvinceID', 'ProvinceID');
	}
}
