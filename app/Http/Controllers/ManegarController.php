<?php

namespace App\Http\Controllers;

use App\Models\manegar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
        $validator = validator($request->all(), [
            'name' => 'required|min:5|max:50',
            'id_number' => 'required|min:9|max:9',
            'phone_number' => 'required|min:10|max:10',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'job'=> 'required'

        ], [
            'name.required' => 'ادخل اسم الاداري',
            'name.min' => 'اسم الاداري قصير',
            'name.max' => 'اسم الاداري طويل',
            'id_number.required' => 'ادخل رقم هوية الاداري',
            'id_number.min' => 'رقم هوية الاداري قصير',
            'id_number.max' => 'رقم الهوية الاداري طويل',
            'phone_number.required' => 'ادخل رقم جوال الاداري',
            'phone_number.min' => 'رقم جوال الاداري قصير',
            'phone_number.max' => 'رقم جوال الاداري طويل',
            'image.required' => 'ادخل صورة اللاعب ',
            'image.image' => 'ادخل  اللاعب ',
            'image.mimes' => ' صورة اللاعب ',
            'image.max' => 'ادخل صورة  ',
            'job.required' => 'ادخل الوظيفة'
            

        ]);

        if (!$validator->fails()) {
            $manegar = new manegar();
            $manegar->name = $request->input('name');
            $manegar->id_number = $request->input('id_number');
            $manegar->phone_number = $request->input('phone_number');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('manegar', $imageName, ['disk' => 'public']);
                $manegar->image = $image;
            }
            $manegar->job = $request->input('job');
            $isSaved = $manegar->save();
            return response()->json([
                'message' => $isSaved ? 'تم الانشاء' : 'فضل الانشاء!'
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
        $validator = Validator($request->all(), [
            'name' => 'required|min:5|max:50',
            'id_number' => 'required|min:9|max:9',
            'phone_number' => 'required|min:9|max:10',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000'
        ], [
            'name.required' => 'ادخل اسم اللاعب',
            'name.min' => 'اسم اللاعب قصير',
            'name.max' => 'اسم اللاعب طويل',
            'id_number.required' => 'ادخل رقم هوية اللاعب',
            'id_number.min' => 'رقم هوية اللاعب قصير',
            'id_number.max' => 'رقم الهوية اللاعب طويل',
            'phone_number.required' => 'ادخل رقم جوال اللاعب',
            'phone_number.min' => 'رقم جوال اللاعب قصير',
            'phone_number.max' => 'رقم جوال اللاعب طويل',
            'image.required' => 'ادخل صورة اللاعب ',
            'image.image' => 'ادخل  اللاعب ',
            'image.mimes' => ' صورة اللاعب ',
            'image.max' => 'ادخل صورة  '

        ]);
        if (!$validator->fails()) {
            $manegar->name = $request->input('name');
            $manegar->id_number = $request->input('id_number');
            $manegar->phone_number = $request->input('phone_number');
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete('' . $manegar->image);
                $file = $request->file('image');
                $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('manegar', $imageName, ['disk' => 'public']);
                $manegar->image = $image;
            }
            $isSaved = $manegar->save();
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
    public function destroy(manegar $manegar)
    {
        //
        $isDeleted = $manegar->delete();
        return response()->json([
            'icon'=> $isDeleted ? 'success':'error',
            'title'=> $isDeleted ? 'تم الحذف':'فشل الحذف!'
        ],$isDeleted ?  Response::HTTP_OK : response::HTTP_BAD_REQUEST
    );
        // return redirect()->route('manegars.index');
    }  
}
