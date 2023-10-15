<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ID_student',
        'firstname',
        'lastname',
        'massage_name',
        'massage_cotent',
        'status_massage',
        'status_read',
    ];

    
}

