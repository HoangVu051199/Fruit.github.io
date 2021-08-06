<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table = 'provinces';
    protected $primaryKey = 'matp';

    protected $fillable=[
        'name',
        'type',
        'slug',
    ];
}
