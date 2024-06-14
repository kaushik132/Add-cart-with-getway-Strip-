<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBill extends Model
{
    use HasFactory;
    protected $table = 'productbills';
    protected $fillable = ['product_name', 'total', 'quantity', 'user_email'];
}
