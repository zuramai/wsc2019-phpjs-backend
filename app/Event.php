<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','slug','date', 'organizer_id'
    ];
    public function tickets() {
        return $this->hasMany(EventTicket::class, 'id');
    }
    public function registrations() {
        return $this->hasManyThrough(Registration::class, EventTicket::class,  'event_id','ticket_id');
    }
    public function channels() {
        return $this->hasMany(Channel::class, 'event_id','id');
    }
    public function rooms() {
        return $this->hasManyThrough(Room::class, Channel::class, 'event_id','channel_id');
    }
}
