<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table = 'feeship';

    protected $fillable=[
        'matp',
        'maqh',
        'xaid',
        'feeship',
    ];

    public function provinces()
    {
    	return $this->belongsTo(Provinces::class, 'matp');
    }

    public function districts()
    {
    	return $this->belongsTo(Districts::class, 'maqh');
    }

    public function wards()
    {
        return $this->belongsTo(Wards::class, 'xaid');
    }
}
