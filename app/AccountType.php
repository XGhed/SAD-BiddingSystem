<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class AccountType extends Model
{
    use SoftDeletes;

    protected $table = 'accounttype';
    protected $primaryKey = 'AccountTypeID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
