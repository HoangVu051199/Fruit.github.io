<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table='payment';

    protected $fillable=[
        'order_id',
        'user_id',
        'money',
        'code',
        'note',
        'vnp_response_code',
        'code_vnpay',
        'code_bank',
        'time',
    ];
}
