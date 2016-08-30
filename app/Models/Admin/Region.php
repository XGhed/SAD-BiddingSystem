<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'Region';
    protected $primaryKey = 'RegionID';    
    public $timestamps = false;
}
