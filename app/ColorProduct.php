<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    //
    protected $fillable =[
        'product_id','color_id'
    ];
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
