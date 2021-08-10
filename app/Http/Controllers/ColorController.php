<?php

namespace App\Http\Controllers;

use App\Color;
use App\ColorImg;
use App\Product;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.product.color.index';
        $this->create = 'admin.product.color.create';
        $this->edit = 'admin.product.color.edit';
        $this->show = 'admin.product.color.show';
    }
    public function index(){
        $list = Color::get();
        return view($this->index,compact('list'));
    }
    public function create(){
        return view($this->create);
    }
    public function store(Request $req){
        Color::create($req->all());
        return redirect('/admin/product/color');
    }
    public function edit($id){
        $color = Color::find($id);
        return view($this->edit,compact('color'));
    }
    public function update(Request $req,$id){
        // dd($req->all());
        $color = Color::find($id);
        if($req->hasFile('photos')){
            foreach($req->photos as $item){
                $paths = FileController::imgUpload($item, $color->color_name);
                ColorImg::create([
                    'photos' => $paths,
                    'color_id' => $id,
                    'product_id' => $req->product_id
                ]);
            }
        }
        $color->update([
            'color' => $req->color,
            'color_name' => $req->color_name,
        ]);
        return redirect('/admin/product/color')->with('msg','更新與加入圖片成功');
    }
    public function delete($id){
        $delete = Color::find($id);
        if($delete->color_photos->count() != 0){
            return redirect('/admin/product/color')->with('msg','顏色裡面還有相關圖片，請先刪除圖片再刪除顏色。');
        }
        $delete->delete();
        return redirect('/admin/product/color')->with('msg','刪除成功');
    }
}
