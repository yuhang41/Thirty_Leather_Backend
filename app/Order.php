<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'order_no', 'name','phone','email','address','price','pay_type'
        ,'shipping','shipping_fee','shipping_status_id','order_status_id','remark'
    ];
    public function detail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
