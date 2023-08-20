<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'year',
        'organizer',
        'award_name',
        'amount',
        'reward_type',
    ];
}
