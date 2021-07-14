<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->index = 'admin.user.index';
        $this->create = 'admin.user.create';
        $this->edit = 'admin.user.edit';
        $this->show = 'admin.user.show';
    }
    public function index(){
        $list = User::get();
        return view($this->index,compact('list'));
    }

    public function create(){
        return view($this->create);
    }
    public function store(Request $req){
        //Validator驗證功能
        $validator = Validator::make($req->all(), [
            //欄位 =>[驗證規定]
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        //fails()會看Validator是否驗證成功，如果失敗 = true， 成功 = false
        if($validator->fails()){
            //redirect()頁面響應
            //back()回上一頁
            //withErrors();會把錯誤訊息存到Session裡
            return redirect()->back()->withErrors($validator->errors());
        }

        User::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'password' => Hash::make($req['password']),
            'role' => $req['role'],
            'phone' => $req['phone'],
            'address' => $req['address'],
        ]);
        // if($req->role === 'user'){
        //     UserClient::create([
        //         'phone' => $req->phone,
        //         'address' => $req->address,
        //         'user_id' => $user->id
        //     ]);
        // }
        return redirect('/admin/user')->with('msg','新增成功');
    }

    public function edit($id){
        $edit_record = User::find($id);
        // dd($edit_record->client->phone);
        return view($this->edit,compact('edit_record'));
    }
    public function update(Request $req, $id){
        $validator = Validator::make($req->all(), [
            //欄位 =>[驗證規定]
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }


        User::where('id',$id)->update([
            'name' => $req->name,
            'password' => Hash::make($req->password),
            'phone' => $req->phone,
            'address' => $req->address,
        ]);

        // if(User::find($id)->role === 'user'){
        //     // dd($req->phone);
        //     UserClient::where('user_id',$id)->update([
        //         'phone' => $req->phone,
        //         'address' => $req->address,
        //     ]);
        // }

        return redirect('/admin/user')->with('msg','更新成功');
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect('/admin/user')->with('msg','刪除成功');
    }
}
