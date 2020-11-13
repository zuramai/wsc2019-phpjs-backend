<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'room_id','title','description','speaker','start','end','type','cost'
    ];
}
