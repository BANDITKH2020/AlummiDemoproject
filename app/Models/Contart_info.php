<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contart_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'ID_facebook',
        'ID_instagram',
        'ID_email',
        'ID_line',
        'telephone',
        'image',
        'status_contact',
        'attention', 
        'prefix',
    ];
}
