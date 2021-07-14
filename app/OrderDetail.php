<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id','quantity','old','size','color'
    ];
    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
