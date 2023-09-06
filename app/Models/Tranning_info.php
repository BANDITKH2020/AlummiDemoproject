<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranning_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'Certi_name',
        'Organize_name',
        'startdate',
        'enddate',
    ];
}
