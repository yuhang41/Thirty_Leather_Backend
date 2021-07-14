<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOtherImg extends Model
{
    //
    protected $fillable =[
        'photos','product_id'
    ];
    public function products(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
