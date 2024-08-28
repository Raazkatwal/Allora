<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticable
{
    use HasFactory;
    protected $fillable = ['email', 'username', 'password'];
    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
