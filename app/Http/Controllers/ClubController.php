<?php

namespace App\Http\Controllers;

use App\Models\club;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = club::all();
        return response()->view('index.index3', ['club' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view("loginn.clublogin");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|min:5|max:50',
            'gmail' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'ادخل اسم النادي',
            'name.min' => 'اسم النادي قصير',
            'name.max' => 'اسم النادي طويل',
            'gmail.required' => 'ادخل البريد الالكتروني',
            'password.required' => 'ادخل كلمة السر'
        ]);
        if (!$validator->fails()) {
            $club = new club();
            $club->name = $request->input('name');
            $club->gmail = $request->input('gmail');
            $club->password = Hash::make($request->input('password'));
            $isSaved = $club->save();
            return response()->json([
                'message' => $isSaved ? 'تم الاضافة بنجاح' : 'فشلت الاضافة!'
            ], $isSaved ? response::HTTP_CREATED : response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(club $club)
    {
        //
        return response()->view('loginn.editclub', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, club $club)
    {
        //
        // dd($request->input('password'));

        $request->validate([
            'name' => 'required|min:5|max:50',
            'gmail' => 'required|',
        ], [
            'name.required' => 'ادخل اسم النادي',
            'name.min' => 'اسم النادي قصير',
            'name.max' => 'اسم النادي طويل',
            'gmail.required' => 'ادخل رقم هوية اللاعب',
        ]);
        $club->name = $request->input('name');
        $club->gmail = $request->input('gmail');
       if($request->has('password') && $request->input('password')){
            $club->password = Hash::make($request->input('password'));
       }
        

        $is_Saved = $club->save();
        session()->flash('message', $is_Saved ? "تم التعديل " : "فشل التعديل ");
        session()->flash('status', $is_Saved);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(club $club)
    {
        //
        $isDeleted = $club->delete();
        return response()->json(
            [
                'icon' => $isDeleted ? 'success' : 'error',
                'title' => $isDeleted ? ' تم الحذف' : 'deleted failed!'
            ],
            $isDeleted ? response::HTTP_OK : response::HTTP_BAD_REQUEST
        );
    }
}
