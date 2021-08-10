<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\ProductType;
use App\ColorProduct;
use App\ProductOtherImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.product.item.index';
        $this->create = 'admin.product.item.create';
        $this->edit = 'admin.product.item.edit';
        $this->show = 'admin.product.item.show';
    }
    public function index(){
        $list = Product::get();
        return view($this->index,compact('list'));
    }
    public function create(){
        $type = ProductType::get();
        $sizes = Product::SIZE;
        $color = Color::get();
        return view($this->create,compact('type','sizes','color'));
    }
    public function store(Request $req){
        dd($req->all());
        $req_all = $req->all();
        // dd($req_all);
        if($req->hasFile('photo')){
            //$req_all['photo'] 從所有欄位裡找到 'photo' 欄位。
            $req_all['photo'] = FileController::imgUpload($req->photo,'main');
        }
        $create = Product::create($req_all);
        if($req->photos){
            foreach($req->photos as $item){
                $path = FileController::imgUpload($item,'other');
                ProductOtherImg::create([
                    'photos' => $path,
                    'product_id' => $create->id
                ]);
            };
        }
        foreach($req->color_id as $item){
            ColorProduct::create([
                'product_id' => $create->id,
                'color_id' => $item,
            ]);
        };
        return redirect('/admin/product')->with('msg','新增成功');
    }
    public function edit($id){
        $type = ProductType::get();
        $edit = Product::find($id);
        $sizes = Product::SIZE;
        $color = Color::get();
        return view($this->edit,compact('type','edit','sizes','color'));
    }
    public function update(Request $req,$id){

        if($req->color_id){
            ColorProduct::where('product_id',$id)->delete();
            foreach($req->color_id as $item){
                ColorProduct::create([
                    'product_id' => $id,
                    'color_id' => $item
                ]);
            }
        }
        $old_record = Product::find($id);
        if($req->hasFile('photo')){
            File::delete(public_path(), $old_record->photo);
            $phat = FileController::imgUpload($req->photo,'main');
            $old_record['photo'] = $phat;
        }
        if($req->photos){
            foreach($req->photos as $item){
                $paths = FileController::imgUpload($item,'other');
                ProductOtherImg::create([
                    'photos' => $paths,
                    'product_id' => $id
                ]);
            }
        }
        Product::where('id',$id)->update([
            'product_type_id' => $req->product_type_id,
            'product_name' => $req->product_name,
            'product_nickname' => $req->product_nickname,
            'price' => $req->price,
            'discount' => $req->discount,
            'product_quantity' => $req->product_quantity,
            'size' => $req->size,
            'content' => $req->content,
        ]);
        return redirect('/admin/product')->with('msg','更新成功');
    }
    public function delete($id){
        $main_photo = Product::find($id);
        $other_photos = ProductOtherImg::where('product_id',$id)->get();
        foreach($other_photos as $item){
            File::delete(public_path(),$item->photos);
        }
        File::delete(public_path(),$main_photo->photo);
        $main_photo->delete();
        ColorProduct::where('product_id',$id)->delete();
        ProductOtherImg::where('product_id',$id)->delete();
        return redirect('/admin/product')->with('msg','刪除成功');
    }
    public function deleteImg(Request $req){
        $delimg = ProductOtherImg::find($req->id);
        if(file_exists(public_path() . $delimg->photos)){
            File::delete(public_path() . $delimg->photo);
        }
        $delimg->delete();
    }
}
