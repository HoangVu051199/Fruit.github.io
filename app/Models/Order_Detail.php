<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'order_detail';

    protected $fillable = [
        'product_id',
        'order_id',
        'order_code',
        'product_name',
        'product_price',
        'product_quantity',
        'product_feeship',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
