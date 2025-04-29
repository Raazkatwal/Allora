<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'id',
        'site_name',
        'site_description',
        'maintenance_mode',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
    ];
}
