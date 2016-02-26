<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model
{
    use SoftDeletes;

    protected $table = 'keyword';
    protected $primaryKey = 'KeywordID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
