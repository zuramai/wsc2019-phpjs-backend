<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'name','slug','email','password_hash','password_hash'
    ];
    protected $hidden = ['password_hash'];

    public function username() {
        return 'email';
    }
    public function getAuthPassword() {
        return $this->password_hash;
    }
}
