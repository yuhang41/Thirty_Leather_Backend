<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\ProductType;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    //
    public function __construct(){
        $this->index = 'front.index';
        $this->step1 = 'front.shopping-cart.shopping-step1';
        $this->step2 = 'front.shopping-cart.shopping-step2';
        $this->step3 = 'front.shopping-cart.shopping-step3';
        $this->product_index = 'front.product.index';
        $this->product_detail = 'front.product.detail';
        //user
        $this->user_index = 'front.user.index';
        $this->user_password_modify = 'front.user.password-modify';
        //login
        $this->login = 'front.login.index';
        //shose
        $this->shose = 'front.shose.index';
    }
    public static function CartCalc(){//計算價錢跟數量和運費的共用涵式
        $total = \Cart::getTotalQuantity();//取的session Cart 裡的所有 quantity 總數量
        $cost = \Cart::getSubTotal();//取的session Cart 裡的所有 price * 所有 quantity
        $shipping = $cost > 1000 ? 0 :60;
        $All =['total'=>$total,'cost'=>$cost,'shipping'=>$shipping];
        return $All;
    }
    public static function Calculation($price,$discount){
        return round($price * $discount);
    }
    public function index(){
        $products = Product::get();
        return view($this->index,compact('products'));
    }

    public function ShoppingStep1(){
        $list = \Cart::getContent()->sortKeys();
        $product_type = ProductType::find(13);
        $colors = Product::COLOR;
        $sizes = Product::SIZE;
        return view($this->step1,compact('list','colors','sizes','product_type'));
    }

    public function ShoppingStep2(){
        $Calc_All = $this->CartCalc();
        $list = \Cart::getContent()->sortKeys();
        $colors = Product::COLOR;
        $sizes = Product::SIZE;
        // dd(Auth::user()->id);
        return view($this->step2,compact('Calc_All','colors','sizes','list'));
    }
    public function Step2_Check(Request $req){
        Session::put('receive-name', $req->receive_name);
        Session::put('receive-phone', $req->receive_phone);
        Session::put('date',date('Y-m-d h:i:s a', time()));

        $cartProduct = \Cart::getContent();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_no' => '#ID'.time().rand(1,999),
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'address' => Auth::user()->address,
            'price' => 99999999,
            'pay_type' => '貨到付款',
            'shipping' => '宅配',
            'shipping_fee' => 99999999,
            'shipping_status_id' => 0,
            'order_status_id' => 0,
            'remark' => $req->remark
        ]);
        $countPoint = 0;
        foreach($cartProduct as $cart){
            $product = Product::find($cart->id);
            $countPoint += $this->Calculation($product->price,$product->discount) * $cart->quantity;

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $cart->quantity,
                'old' => json_encode($product),
                'size' => json_encode($cart->attributes->size),
                'color' => json_encode($cart->attributes->color),
            ]);
        }
        $order->update([
            'price' => $countPoint,
            'shipping_fee' => $countPoint > 1000 ? 0 : 60
        ]);
        if($order->find($order->id)){
            \Cart::clear();
        }
        Session::put('order',$order);
        return redirect('/front/shoppingstep3');

        // return redirect('/front/shoppingstep3',compact('order','receive_name','receive_phone','date'));
    }

    public function ShoppingStep3(){
        $order = Session::get('order');
        // dd(count($order->detail));
        $receive_name = Session::get('receive-name');
        $receive_phone = Session::get('receive-phone');
        $date = Session::get('date');
        $colors = Product::COLOR;
        $sizes = Product::SIZE;
        return view($this->step3,compact('order','receive_name','receive_phone','receive_phone','colors','sizes','date'));
    }

    public function product_index(){
        $products = Product::get();
        return view($this->product_index,compact('products'));
    }
    public function product_detail($id){
        $product = Product::find($id);
        $list = Product::get();
        return view($this->product_detail,compact('product','list'));
    }

    public function add(Request $req){
        $product = Product::find($req->productId);
        $price = $this->Calculation($product->price,$product->discount);
        $quantity = $req->quantity;
        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->product_name,
            'price' => $price,
            'quantity' => $quantity,
            'attributes' => array(
                'photo' => $product->photo,
                'nickname' => $product->product_nickname,
                'size' => $req->size,
                'color' => $req->color,
                'discount' => $product->discount
            )
        ));
        return 'success';
    }
    public function update(Request $req){
        \Cart::update($req->productId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $req->newValue
            ),
        ));
        return 'success';
    }
    public function delete($id){
        \Cart::remove($id);
        return redirect('/front/shoppingstep1')->with('message','購物車刪除成功');
    }
    public function CartContent(){
        $dataCart = \Cart::getContent();
        dd($dataCart);
    }
    public function content(){
        $cartCollection = \Cart::getContent();//可以看到現在的 Cart 裡的內容有哪些
        dd($cartCollection);
    }
    public function clear(){
        \Cart::clear();
    }

    //user
    public function user_index(){
        $list_order = Order::where('user_id',Auth::user()->id)->get();
        $user = User::find(Auth::user()->id);
        return view($this->user_index,compact('list_order','user'));
    }
    public function user_update(Request $req){
        // dd($req->all());
        $address = $req->county.''.$req->district.''.$req->address;
        if($req->date){
            User::where('id',Auth::user()->id)->update([
                'date' => date("Y-m-d")
            ]);
        }
        User::where('id',Auth::user()->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $address,
        ]);
        return redirect('/front/user');
    }
    public function user_password_modify(){
        return view($this->user_password_modify);
    }

    public function user_password_update(Request $req){
        if(!Hash::check($req->old_password,Auth::user()->password)){
            return redirect('/front/user/passwordModify')->with('error','舊密碼輸入錯誤');
        };
        User::where('id',Auth::user()->id)->update([
            'password' => Hash::make($req->new_password),
        ]);
        return redirect('/front/user/passwordModify')->with('message','密碼更改成功');
    }


    //login
    public function login(){
        return view($this->login);
    }
    public function shose(){
        return view($this->shose);
    }
}
