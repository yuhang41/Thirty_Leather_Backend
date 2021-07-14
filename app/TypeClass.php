<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClass extends Model
{
    //
    protected $fillable =[
        'type_class_name'
    ];
    public function types(){
        return $this->hasMany(ProductType::class,'type_class_id','id');
    }
}
