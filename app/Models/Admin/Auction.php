<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'Auction';
    protected $primaryKey = 'AuctionID';
    public $timestamps = false;
}
