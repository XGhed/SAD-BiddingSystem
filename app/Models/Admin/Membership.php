<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $primaryKey = 'MembershipID';
    public $timestamps = false;
}
