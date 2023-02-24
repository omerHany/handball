<?php

namespace App\Http\Controllers;

use App\Models\manegar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManegarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = manegar::all();
        return response()->view('index.index2', ['manegar' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view("loginn.manegarlogin");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:5|max:50',
            'id_number' => 'required|min:9|max:9',
            'phone_number' => 'required|min:10|max:10',
            'job'=> 'required'
        ], [
            'name.required' => 'ادخل اسم المدرب',
            'name.min' => 'اسم المدرب قصير',
            'name.max' => 'اسم المدرب طويل',
            'id_number.required' => 'ادخل رقم هوية المدرب',
            'id_number.min' => 'رقم هوية المدرب قصير',
            'id_number.max' => 'رقم الهوية المدرب طويل',
            'phone_number.required' => 'ادخل رقم جوال المدرب',
            'phone_number.min' => 'رقم جوال المدرب قصير',
            'phone_number.max' => 'رقم جوال المدرب طويل',
            'job.required' => 'ادخل الوظيفة',

        ]);

        $manegar = new manegar();
        $manegar->name = $request->input('name');
        $manegar->id_number = $request->input('id_number');
        $manegar->phone_number = $request->input('phone_number');
        $manegar->job = $request->input('job');
        $is_Saved = $manegar->save();
        return redirect()->route('manegars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(manegar $manegar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manegar $manegar)
    {
        //
        return response()->view('loginn.editmanegar',['manegar'=>$manegar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manegar $manegar)
    {
        //
        $request->validate([
            'name' => 'required|min:5|max:50',
            'id_number' => 'required|min:9|max:9',
            'phone_number' => 'required|min:10|max:10',
            'job' => 'required'
        ], [
            'name.required' => 'ادخل اسم المدرب',
            'name.min' => 'اسم المدرب قصير',
            'name.max' => 'اسم المدرب طويل',
            'id_number.required' => 'ادخل رقم هوية المدرب',
            'id_number.min' => 'رقم هوية المدرب قصير',
            'id_number.max' => 'رقم الهوية المدرب طويل',
            'phone_number.required' => 'ادخل رقم جوال المدرب',
            'phone_number.min' => 'رقم جوال المدرب قصير',
            'phone_number.max' => 'رقم جوال المدرب طويل',
            'job.required' => 'ادخل الوظيفة',

        ]);

        // $manegar = new manegar();
        $manegar->name = $request->input('name');
        $manegar->id_number = $request->input('id_number');
        $manegar->phone_number = $request->input('phone_number');
        $manegar->job = $request->input('job');
        $is_Saved = $manegar->save();
        session()->flash('message', $is_Saved ? "تم التعديل " : "فشل التعديل ");
        session()->flash('status', $is_Saved);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manegar $manegar)
    {
        //
        $isDeleted = $manegar->delete();
        return response()->json([
            'icon'=> $isDeleted ? 'success':'error',
            'title'=> $isDeleted ? 'تم الحذف':'beleted failed!'
        ],$isDeleted ?  Response::HTTP_OK : response::HTTP_BAD_REQUEST
    );
        // return redirect()->route('manegars.index');
    }  
}
