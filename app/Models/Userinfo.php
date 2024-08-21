<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['address', 'phone', 'usertype', 'photo'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
