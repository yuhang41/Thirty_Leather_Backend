<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowList extends Model
{
    //
    protected $fillable =[
        'user_id','product_id','color_id','name','nickname','price','discount','photo','color','size'
    ];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
