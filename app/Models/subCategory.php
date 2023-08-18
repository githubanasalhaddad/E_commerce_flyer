<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['slug', 'product_count', 'category_name', 'category_id', 'subCategoryName'];
}
