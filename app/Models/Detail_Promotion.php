<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Promotion extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table='detail_promotion';

    protected $fillable=[
        'promotion_id',
        'product_id',
    ];


    public function promotion()
    {
    	return $this->belongsTo(Promotion_Product::class);
    }
    
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
