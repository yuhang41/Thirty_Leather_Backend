<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $fillable =[
        'product_type','type_class_id'
    ];
    public function products(){
        return $this->hasMany(Product::class,'product_type_id','id');
    }
    public function type_class(){
        return $this->hasOne(TypeClass::class,'id','type_class_id');
    }
}
