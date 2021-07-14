<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    const SIZE =[
        'cm:21.5','cm:22','cm:22.5','cm:23','cm:23.5','cm:24','cm:24.5','cm:25','cm:25.5','cm:26','cm:26.5','cm:27','cm:27.5','cm:28','cm:29','cm:30','cm:30.5',
        'Eu:34','Eu:35','Eu:36','Eu:37','Eu:37.5','Eu:38','Eu:38.5','Eu:39','Eu:40','Eu:40.5','Eu:41','Eu:42','Eu:42.5','Eu:43','Eu:44','Eu:44.5','Eu:45','Eu:46','Eu:47'
    ];
    const COLOR = [
        '原皮裸麥' => '#dbd0bd',
        '焦糖宗' => '#a8673a',
        '紳士白' => '#a0a0a0',
        '經典黑' => '#1d2335',
        '酒紅色' => '#77170a',
    ];
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

    public function setSizeAttribute($value){
        $this->attributes['size'] = json_encode($value);
    }
    public function getSizeAttribute($value)
    {
        return $this->attributes['size'] = json_decode($value);
    }
    public function setColorAttribute($value)
    {
        $this->attributes['color'] = json_encode($value);
    }
    public function getColorAttribute($value)
    {
        return $this->attributes['color'] = json_decode($value);
    }
}
