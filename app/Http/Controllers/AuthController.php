<?php

namespace App\Http\Controllers;

use Flasher\Laravel\Http\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function ShowLogin(){
        return view('loginn.login');
    }

    public function login(Request $request)
    {

        $validator = validator($request->all(),[
            'email'=> 'required|email|exists:clubs,gmail',
            'password'=>'',
            'remember'=>''

        ]);
        // return response()->json(['massage'=>'massageee qd'],Response::HTTP_BAD_EQUEST);
    }
}
