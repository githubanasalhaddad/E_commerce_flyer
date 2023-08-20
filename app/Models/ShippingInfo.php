<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingInfo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['phone_number', 'city_name', 'postal_code', 'user_id'];
}
