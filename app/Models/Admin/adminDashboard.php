<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class adminDashboard extends Model
{
    protected $table = 'Dashboard';
    protected $primaryKey = 'Company';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
