<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'auction';
    protected $primaryKey = 'AuctionID';
    public $timestamps = false;
}
