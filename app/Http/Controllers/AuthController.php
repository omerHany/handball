<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function ShowLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $validator = validator($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:3',
            'remember' => 'boolean'
        ],[
            'email.required'=>'ادخل الريد الالكتروني',
            'email.email'=>'مطلوب بريد الكتروني',
            'email.exists'=>'البريد الالكتروني غير صحيح',
            'password.required'=>'ادخل كلمة السر',
            'password.string' => 'كلمة السر غير صحيحة',
            'password.min'=>'كلمة السر قصيرة',
            'remember.boolrsn'=>''

        ]);
        $credentials = ['email' => $request->input('email'),'password' => $request->input('password')];
        if (!$validator->fails()) {
            if (Auth::guard('admin')->attempt($credentials, $request->input('remember'))) {
                return response()->json(['message' => 'تم التسجيل'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'فشل تسجيل الدخول! تحقق من بياناتك'],Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        // return response()->json(['massage'=>'massageee qd'],Response::HTTP_BAD_EQUEST);
    }



    public function editpassword(Request $request){
        return response()->view('setting.change-password');
    }


    public function updatepassword(Request $request){
        $validator = validator($request->all(),[
            'password'=>'required|string|current_password:admin',
            'new_password'=> 'required|string|min:3|confirmed',
            'new_password_confirmation' => 'required|string|min:3',
        ]);
        if(!$validator->fails()){
            $user = $request->user('admin');
            $user->password = Hash::make($request->input('new_password'));
            $isSaved = $user->save();
            return response()->json([
                'message'=> $isSaved ? 'تم تغيير كلمة السر':'فشل تغيير كلمة السر!'
            ],$isSaved ? Response::HTTP_OK : response::HTTP_BAD_REQUEST);

        }else{
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function logout(Request $request){
       Auth::guard('admin')->logout();
       $request->session()->invalidate();
        return redirect()->route('homee');
       
    }
}
