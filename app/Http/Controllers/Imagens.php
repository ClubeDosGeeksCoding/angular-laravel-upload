<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use DB;

class Imagens extends Controller
{
    public function lista()
    {
    	return DB::table('imagens')	-> get();
    }

    public function nova(){
    	$file = Input::file('file');

    	$path = "img";

    	$ext = $file->getClientOriginalExtension();
    	$fileName = rand(1111,9999) .'.'.$ext;
    	$file->move($path, $fileName);

    	$id = DB::table('imagens')->insertGetId(['arquivo'=>$fileName]);

    	return ['id'=>$id];
    }

    public function delete($id){
    	return DB::table('imagens')
    		-> where('id',$id)
    		-> delete();
    }
    
}
