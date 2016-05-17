<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $primaryKey = 'AccountID';
    public $timestamps = false;
}
