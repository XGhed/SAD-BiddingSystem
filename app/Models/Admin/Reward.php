<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $table = 'reward';
    protected $primaryKey = 'RewardID';
    public $timestamps = false;
}
