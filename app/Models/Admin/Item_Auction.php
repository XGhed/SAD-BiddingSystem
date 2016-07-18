<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Item_Auction extends Model
{
    protected $table = 'item_auction';
    protected $primaryKey = 'AuctionID';
    public $timestamps = false;
}
