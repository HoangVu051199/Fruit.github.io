<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table = 'districts';
    protected $primaryKey = 'maqh';

    protected $fillable=[
        'name',
        'type',
        'matp',
    ];
}
