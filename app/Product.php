<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Eu => cm
    const SIZE =[
        '34' => '21.5' , '35' => '22' , '36' => '22.5',
        '37' => '23' , '37.5' => '23.5' , '38' => '24',
        '38.5' => '24.5' , '39' => '25' , '40' => '25.5',
        '40.5' => '26' , '41' => '26.5' , '42' => '27',
        '42.5' => '27.5' , '43' => '28'
    ];
    // const COLOR = [
    //     '原皮裸麥' => '#dbd0bd',
    //     '焦糖宗' => '#a8673a',
    //     '紳士白' => '#a0a0a0',
    //     '經典黑' => '#1d2335',
    //     '酒紅色' => '#77170a',
    // ];
    //
    protected $fillable = [
        'product_type_id', 'product_name','product_nickname', 'price','size','color','product_quantity','content','photo','discount'
    ];
    public function type(){
        return $this->hasOne(ProductType::class,'id','product_type_id');
    }
    public function photos(){
        return $this->hasMany(ProductOtherImg::class,'product_id','id');
    }
    public function detail(){
        return $this->hasOne(OrderDetail::class,'product_id','id');
    }
    public function colors(){
        return $this->hasMany(ColorProduct::class,'product_id','id');
    }
    public function follow(){
        return $this->hasOne(FollowList::class,'product_id','id');
    }

    public function setSizeAttribute($value){
        $this->attributes['size'] = json_encode($value);
    }
    public function getSizeAttribute($value)
    {
        return $this->attributes['size'] = json_decode($value);
    }
    // public function setColorAttribute($value)
    // {
    //     $this->attributes['color'] = json_encode($value);
    // }
    // public function getColorAttribute($value)
    // {
    //     return $this->attributes['color'] = json_decode($value);
    // }
}
