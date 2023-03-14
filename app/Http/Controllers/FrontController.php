<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function home(Request $request){
        $data = News::all();
        return response()->view('userInterface.user',['data'=>$data]);
    }
}