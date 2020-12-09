<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function tickets() {
        return $this->hasMany(EventTicket::class, 'event_id');
    }

    public function registrations() {
        return $this->hasManyThrough(Registration::class,EventTicket::class,'event_id','ticket_id');
    }

    public function channels() {
        return $this->hasMany(Channel::class);
    }

    public function rooms() {
        return $this->hasManyThrough(Room::class,Channel::class);
    }
}
