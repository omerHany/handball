<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\club;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clubs = Admin::all();
        return response()->view('club.indexClub', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view("club.createClub");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //public function store(Request $request)
        {
            //
            $validator = validator($request->all(), [
                'name' => 'required|min:5|max:50',
                'email' => 'required',
                'password' => 'required'
            ], [
                'name.required' => 'ادخل اسم النادي',
                'name.min' => 'اسم النادي قصير',
                'name.max' => 'اسم النادي طويل',
                'email.required' => 'ادخل البريد الالكتروني',
                'password.required' => 'ادخل كلمة السر'
            ]);
            if (!$validator->fails()) {
                $admin = new admin();
                $admin->name = $request->input('name');
                $admin->email = $request->input('email');
                $admin->password = Hash::make($request->input('password'));
                $isSaved = $admin->save();
                return response()->json([
                    'message' => $isSaved ? 'تم الاضافة بنجاح' : 'فشلت الاضافة!'
                ], $isSaved ? response::HTTP_CREATED : response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'message' => $validator->getMessageBag()->first()
                ], response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $club)
    {
        //
        return response()->view('club.editClub ', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $club)
    {
        //
        $validator = Validator($request->all(), 
            [
                'name' => 'required|min:5|max:50',
                'email' => 'required',
                'password' => 'required'
            ], [
                'name.required' => 'ادخل اسم النادي',
                'name.min' => 'اسم النادي قصير',
                'name.max' => 'اسم النادي طويل',
                'email.required' => 'ادخل البريد الالكتروني',
                'password.required' => 'ادخل كلمة السر'
            ]);
        if (!$validator->fails()) {
            $club->name = $request->input('name');
            $club->email = $request->input('email');
            $club->password = $request->input('password');
            $isSaved = $club->save();
            return response()->json([
                'message' => $isSaved ? 'تم التعديل بنجاح' : 'فشل التعديل!'
            ], $isSaved ? response::HTTP_OK : response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $club)
    {
        if ($club->id == 1) {
            return response()->json(
                [
                    'icon' => 'error',
                    'title' => 'Deleted failed! admin account'
                ],
                response::HTTP_BAD_REQUEST
            );
        }
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
