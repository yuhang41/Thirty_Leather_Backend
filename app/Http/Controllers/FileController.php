<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public static function imgUpload($item,$folder){
        $file = $item;

        if(!is_dir('upload/')){//如果沒有此檔案資料夾
            mkdir('upload/');//建立一個檔案資料夾
        }else if(!is_dir('upload/'.$folder.'/')){
            mkdir('upload/'.$folder.'/');
        }

        $extension = $file->getClientOriginalExtension();//抓副檔名

        $file_name = md5(uniqid(rand())) . "." . $extension;//產出一個亂數名 + 副檔名
        $path = '/upload/'.$folder.'/'.$file_name;

        move_uploaded_file($file , public_path() . '/upload/'.$folder.'/' . $file_name);//move_uploaded_file(要存的檔案 , 檔案要存哪)

        return $path;
    }
}
