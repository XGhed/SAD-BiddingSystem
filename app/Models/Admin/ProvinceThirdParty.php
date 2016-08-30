<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProvinceThirdParty extends Model
{
	use SoftDeletes;

    protected $table = 'ProvinceThirdParty';
    protected $primaryKey = 'PartyID';
    public $timestamps = false;

    public function province()
	{
	    return $this->hasOne('App\Models\Admin\Province', 'ProvinceID', 'ProvinceID');
	}
}
