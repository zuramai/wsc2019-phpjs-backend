<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function sessions() {
        return $this->hasManyThrough(Session::class, Room::class);
    }
    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
