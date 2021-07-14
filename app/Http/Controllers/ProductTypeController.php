<?php

namespace App\Http\Controllers;

use App\ProductType;
use App\TypeClass;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.product.type.index';
        $this->create = 'admin.product.type.create';
        $this->edit = 'admin.product.type.edit';
        $this->show = 'admin.product.type.show';
    }
    public function index(){
        $list = ProductType::get();
        return view($this->index,compact('list'));
    }
    public function create(){
        $class = TypeClass::get();
        return view($this->create,compact('class'));
    }
    public function store(Request $req){
        ProductType::create($req->all());
        return redirect('/admin/product/type')->with('msg','新增成功');
    }
    public function edit($id){
        $edit = ProductType::find($id);
        $class = TypeClass::get();
        return view($this->edit,compact('edit','class'));
    }
    public function update(Request $req,$id){
        // dd($req->all());
        ProductType::where('id',$id)->update([
            'type_class_id' => $req->type_class_id,
            'product_type' => $req->product_type
        ]);
        return redirect('/admin/product/type')->with('msg','更新成功');
    }
    public function delete($id){
        $delete = ProductType::find($id);
        if($delete->products->count() != 0){
            return redirect('/admin/product/type')->with('msg','無法刪除，因為此種類裡還有 ' . $delete->product->count() . ' 筆資料，請到品項裡刪除');
        }else{
            $delete->delete();
            return redirect('/admin/product/type')->with('msg','刪除成功');
        }
    }
}
