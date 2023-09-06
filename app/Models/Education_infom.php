<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_infom extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'School_name',
        'degree',
        'field_study',
        'faculty_study',
        'endyear',
        'gpa',
        'schooltype',
    ];
   
}
