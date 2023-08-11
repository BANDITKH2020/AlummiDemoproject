<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class randomcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'end_date',
        'code',

    ];
}
