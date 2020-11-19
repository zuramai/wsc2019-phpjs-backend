<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'event_id', 'name','cost','special_validity'
    ];
    public function registrations() {
        return $this->hasMany(Registration::class,'ticket_id');
    }
}
