<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_note',
        'payment_method',
        'provinces_id',
        'districts_id',
        'wards_id',
        'status',
    ];

    public function order_detail()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
