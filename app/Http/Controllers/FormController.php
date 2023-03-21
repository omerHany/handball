<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $forms = Form::all();
        return response()->view('forms.edit_forms',['form' => $forms]);
        //
    }


    public function legan(){
        $forms = Form::find(1);
        return response()->view('form.legan',['forms'=> $forms]);
    }

    public function cup(){
        $forms = Form::find(2);
        return response()->view('form.cup',['forms'=>$forms]);
    }

    public function btolat(){
        $forms = Form::find(3);
        return response()->view('form.btolat',['forms'=>$forms]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $forms)
    {
        //
        
        return response()->view('forms.edit_forms',['fomrs'=> $forms]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'content_3' => 'required|string',
            
        ], [
            'content_1.required' => 'ادخل محتوى الصفحة',
            'content_2.required' => 'ادخل محتوى الصفحة',
            'content_3.required' => 'ادخل محتوى الصفحة',

        ]);

        if (!$validator->fails()) {
            $form_1 = Form::find(1);
            $form_2 = Form::find(2);
            $form_3 = Form::find(3);
            $form_1 ->content = $request->input('content_1');
            $form_2 ->content = $request->input('content_2');
            $form_3->content = $request->input('content_3');
            $isSaved = $form_1->save();
            $isSaved = $form_2->save();
            $isSaved = $form_3->save();
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
    public function destroy(Form $form)
    {
        //
    }
}
