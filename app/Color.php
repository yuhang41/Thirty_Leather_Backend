<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable =[
        'color','color_name'
    ];
    public function product(){
        return $this->hasMany(ColorProduct::class,'color_id','id');
    }
    public function color_photos(){
        return $this->hasMany(ColorImg::class,'color_id','id');
    }
}
