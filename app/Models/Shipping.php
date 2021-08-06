<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'shipping';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
