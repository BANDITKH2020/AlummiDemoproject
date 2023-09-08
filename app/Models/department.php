<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'contact_time',
        'phone_number',
        'facebook',
        'map',
        'web',
    ];
}
