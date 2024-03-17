<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'id',
        'userID',
        'name',
        'tel',
        'city',
        'district',
        'ward',
        'address',
        'note',
        'payment',
        'total',
    ];
    use HasFactory;
}
