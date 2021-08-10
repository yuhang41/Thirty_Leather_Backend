<?php

namespace App\Http\Controllers;

use App\ColorImg;
use App\FollowList;
use App\User;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\ProductType;
use App\TypeClass;
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
        $this->user_follow_list = 'front.user.follow-list';
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
        $sizes = Product::SIZE;
        return view($this->step1,compact('list','sizes','product_type'));
    }

    public function ShoppingStep2(){
        $Calc_All = $this->CartCalc();
        $list = \Cart::getContent()->sortKeys();
        $sizes = Product::SIZE;
        return view($this->step2,compact('Calc_All','sizes','list'));
    }
    public function Step2_Check(Request $req){
        Session::put('receive-name', $req->receive_name);
        Session::put('receive-phone', $req->receive_phone);
        Session::put('date',date('Y-m-d h:i:s a', time()));
        Session::put('now_date',date('Y-m-d', time()));

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
            'remark' => $req->remark,
            'date' => Session::get('now_date')
        ]);
        $countPoint = 0;
        foreach($cartProduct as $cart){
            $product = Product::find($cart->id);
            if($product->product_quantity <= 0){
                Order::where('id',$order->id)->delete();
                OrderDetail::where('order_id',$order->id)->delete();
                \Cart::remove($cart->id);
                return redirect('/front/product')->with('message','此商品 ['.$product->product_name.'] 剛剛已售完');
            }
            $quantity = $product->product_quantity - $cart->quantity;
            $product->update([
                'product_quantity' => $quantity
            ]);
            $countPoint += $this->Calculation($product->price,$product->discount) * $cart->quantity;

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $cart->quantity,
                'old' => json_encode($product),
                'size' => json_encode($cart->attributes->size),
                'color' => $cart->attributes->color,
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

        $sizes = Product::SIZE;
        return view($this->step3,compact('order','receive_name','receive_phone','receive_phone','sizes','date'));
    }

    public function product_index(Request $req){
        if($req->type_id){
            $products = Product::where('product_type_id',$req->type_id)->get();
        }else{
            $products = Product::get();
        }
        $class = TypeClass::get();
        return view($this->product_index,compact('products','class'));
    }
    public function product_detail(Request $req,$id){
        $color_photo = 0;
        if($req->color_id){
            $color_photo = Product::find($id)->colors()->where('product_id',$id)->where('color_id',$req->color_id)->first();
            // dd($color_photo);
            $judgment = false;
        }else{
            $judgment = true;
        }
        $product = Product::find($id);
        $list = Product::get();
        $sizes = Product::SIZE;
        return view($this->product_detail,compact('product','list','sizes','judgment','color_photo'));
    }
    // public function product_detail_color(Request $req){

    //     $product = Product::find($req->productId);
    //     $list = Product::get();
    //     $sizes = Product::SIZE;
    //     return view($this->product_detail,compact('product','list','sizes','judgment'));
    // }

    public function add(Request $req){
        $product = Product::find($req->productId);
        $price = $this->Calculation($product->price,$product->discount);
        $quantity = $req->quantity;
        if(!$req->size || !$req->color){
            return 'error';
        }
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $price,
            'quantity' => $quantity,
            'attributes' => array(
                'photo' => $product->photo,
                'nickname' => $product->product_nickname,
                'size' => $req->size,
                'color' => $req->color,
                'colorId' => $req->color_id,
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
                'date' => $req->date,
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
    public function user_addFollow(Request $req){
        $productId = Product::find($req->productId);
        $cart = \Cart::get($req->cartId);
        $color_img = ColorImg::where('color_id',$cart->attributes->colorId)->first();
        $follow = FollowList::where('user_id',Auth::user()->id)
                            ->where('product_id',$productId->id)
                            ->where('color_id',$cart->attributes->colorId)->first();

        if($follow){
            dd('123');
            return 'error';
        }else{
            FollowList::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId->id,
                'color_id' => $cart->attributes->colorId,
                'name' => $productId->product_name,
                'nickname' => $productId->product_nickname,
                'price' => $productId->price,
                'discount' => $productId->discount,
                'color' => $cart->attributes->color,
                'size' => $cart->attributes->size,
                'photo' => $color_img->photos
            ]);
            return 'success';
        }

    }
    public function user_deleteFollow(Request $req){//從購物車刪除
        $productId = Product::find($req->productId);
        $cart = \Cart::get($req->cartId);
        FollowList::where('user_id',Auth::user()->id)
                    ->where('product_id',$productId->id)
                    ->where('color_id',$cart->attributes->colorId)->delete();
        return 'success';
    }
    public function delete_Follow($id){//從會員的追蹤清單刪除
        $followId = FollowList::find($id);
        FollowList::where('user_id',Auth::user()->id)
                    ->where('product_id',$followId->product_id)
                    ->where('color_id',$followId->color_id)->delete();
        return redirect('/front/user/follow')->with('message','成功刪除追蹤清單');
    }
    public function user_follow(){
        $list = FollowList::where('user_id',Auth::user()->id)->get();
        $product = Product::get();
        return view($this->user_follow_list,compact('list'));
    }

    //login
    public function login(){
        return view($this->login);
    }
    public function shose(){
        return view($this->shose);
    }
}
