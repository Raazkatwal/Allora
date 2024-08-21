<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'username', 'password'];
    public function userinfo(){
        return $this->hasOne(Userinfo::class);
    }
}
