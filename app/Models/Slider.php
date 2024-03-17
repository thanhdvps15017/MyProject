<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = [
        'content-1',
        'content-2',
        'content-3',
        'images',
    ];
    use HasFactory;
}
