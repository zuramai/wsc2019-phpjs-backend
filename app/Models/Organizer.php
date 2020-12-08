<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'password_hash'
    ];

    public function username() {
        return 'email';
    }

    public function getAuthPassword() {
        return $this->password_hash;
    }
}
