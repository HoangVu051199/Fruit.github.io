<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate_New extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'cate_new';

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
}
