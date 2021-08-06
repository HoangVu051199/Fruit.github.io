<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion_Product extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table='promotion_product';

    protected $fillable=[
        'name',
        'sale',
        'type_sale',
        'start',
        'finish',
        'status',
    ];

    public function detail_promotion()
    {
        return $this->hasMany(Detail_Promotion::class, 'promotion_id');
    }
}
