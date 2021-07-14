<?php

namespace App\Http\Controllers;

use App\TypeClass;
use Illuminate\Http\Request;

class TypeClassController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.product.class.index';
        $this->create = 'admin.product.class.create';
        $this->edit = 'admin.product.class.edit';
        $this->show = 'admin.product.class.show';
    }
    public function index(){
        $list = TypeClass::get();
        return view($this->index,compact('list'));
    }
    public function create(){
        return view($this->create);
    }
    public function store(Request $req){
        TypeClass::create($req->all());
        return redirect('/admin/product/class')->with('msg','新增成功');
    }
    public function edit($id){
        $edit = TypeClass::find($id);
        return view($this->edit,compact('edit'));
    }
    public function update(Request $req,$id){
        // dd($req->all());
        TypeClass::where('id',$id)->update([
            'type_class_name' => $req->type_class_name
        ]);
        return redirect('/admin/product/class')->with('msg','更新成功');
    }
    public function delete($id){
        $delete = TypeClass::find($id);
        if($delete->types->count() != 0){
            return redirect('/admin/product/class')->with('msg','無法刪除，因為此種類裡還有 ' . $delete->types->count() . ' 筆資料，請到品項裡刪除');
        }else{
            $delete->delete();
            return redirect('/admin/product/class')->with('msg','刪除成功');
        }
    }
}
