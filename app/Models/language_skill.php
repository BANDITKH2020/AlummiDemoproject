<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class language_skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'language',
        'listening',
        'speaking',
        'reading',
        'writing',
    ];
}
