<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsandactivity extends Model
{
    use HasFactory;
    protected $fillable =[
        'title_name',
        'cotent',
        'title_image',
        'category',
        'objective',
        'cotent_type',
    ];
    public function images()
    {
        return $this->hasMany(addimage::class);
    }
}
