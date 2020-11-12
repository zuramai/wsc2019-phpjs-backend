<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    public function registrations() {
        return $this->hasMany(Registration::class,'ticket_id');
    }
}
