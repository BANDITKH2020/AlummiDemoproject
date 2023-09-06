<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workhistory_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_student',
        'startdate',
        'enddate',
        'Company_name',
        'position',
        'salary',
        'Company_add',
        'description',
        'worktype',
    ];
}
