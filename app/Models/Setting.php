<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'school_name',
        'email',
        'phone',
        'address',
        'social_media',
        'map_link',
        'school_photo',
    ];
}
