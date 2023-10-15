<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_fileMassage extends Model
{
    use HasFactory;
    protected $fillable = [

        'massage_file',
        'massage_id',
    ];
}
