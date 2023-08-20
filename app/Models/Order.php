<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id', 'shipping_phoneNumber', 'shipping_city',
        'shipping_postcode', 'total_price', 'total_price', 'quantity', 'product_name'
    ];
}
