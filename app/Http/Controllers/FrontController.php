<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function home(Request $request){
        $data = News::paginate(5);
        return response()->view('form.home',['data'=>$data]);
    }
}