<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.product.size.index';
        $this->create = 'admin.product.size.create';
        $this->edit = 'admin.product.size.edit';
    }
    public function index(){
        $list = Size::get();
        return view($this->index,compact('list'));
    }
    public function create(){
        $list = Size::get();
        return view($this->create,compact('list'));
    }
    public function store(Request $req){
        Size::create($req->all());
        return redirect('/admin/product/size')->with('msg','新增成功');
    }
    public function edit($id){
        $edit = Size::find($id);
        return view($this->edit,compact('edit'));
    }
    public function update(Request $req,$id){
        Size::where('id',$id)->update([
            'cm' => $req->cm,
            'us' => $req->us,
            'uk' => $req->uk,
            'eu' => $req->eu,
        ]);
        return redirect('/admin/product/size')->with('msg','更新成功');
    }
    public function delete($id){
        Size::where('id',$id)->delete();
        return redirect('/admin/product/size')->with('msg','刪除成功');
    }
}
