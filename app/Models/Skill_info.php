<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'Skill_name',
        
    ];
}
