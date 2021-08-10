<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorImg extends Model
{
    //
    protected $fillable =[
        'photos','color_id','product_id'
    ];
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
