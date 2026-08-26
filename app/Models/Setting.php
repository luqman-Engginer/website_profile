<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings'; // <-- Tegaskan kalau nama tabelnya pakai 's'

    protected $fillable = [
        'school_name',
        'email',
        'phone',
        'address'
    ];
}
