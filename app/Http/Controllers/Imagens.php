<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class Imagens extends Controller
{
    public function lista()
    {
    	return DB::table('imagens')	-> get();
    }

    
}
