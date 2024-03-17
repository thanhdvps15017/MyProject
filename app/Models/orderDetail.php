<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = [
        'id',
        'order_id',
        'user_id',
        'product_id',
        'productName',
        'quantity',
        'price',
    ];
    use HasFactory;
}
