<?php

namespace App\Http\Controllers;

use App\Models\player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = player::all();
        return response()->view('index.index1',['player'=> $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view("loginn.playerlogin");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         
        // $validator = validator($request->all(),[
        //     'name' => 'required|min:5|max:50',
        //     'id_number'=>'required|min:0|max:9',
        //     'phone_number'=>'required|min:0|max:10'
        // ],[
        //     'name.required'=>'ادخل اسم اللاعب',
        //     'name.min' => 'اسم اللاعب قصير',
        //     'name.max' => 'اسم اللاعب طويل',
        //     'id_number.required' => 'ادخل رقم هوية اللاعب',
        //     'id_number.min' => 'رقم هوية اللاعب قصير',
        //     'id_number.max' => 'رقم الهوية اللاعب طويل',
        //     'phone_number.required' => 'ادخل رقم جوال اللاعب',
        //     'phone_number.min' => 'رقم جوال اللاعب قصير',
        //     'phone_number.max' => 'رقم جوال اللاعب طويل'
        // ]);
        // if (!$validator->failed()){
        //     $player = new player();
        // $player->name =$request->input('name');
        // $player->id_number =$request->input('id_number');
        // $player->phone_number =$request->input('phone_number');
        // $isSaved = $player->save();
        // return response()->json([
        //     'message'=> $isSaved ? 'Created succesfully' : 'created failed!'
        // ], $isSaved ? response::HTTP_CREATED : response::HTTP_BAD_REQUEST);
        // }
        //     else{
        //         return response()->json([
        //             'message' => $validator->getMessageBag()->first()
        //         ], response::HTTP_BAD_REQUEST );
        //     }





        $request->validate([
            'name'=>'required|min:5|max:50',
            'id_number'=>'required|min:0|max:9',
            'phone_number'=>'required|min:0|max:10'
        ],[
            'name.required'=>'ادخل اسم اللاعب',
            'name.min' => 'اسم اللاعب قصير',
            'name.max' => 'اسم اللاعب طويل',
            'id_number.required' => 'ادخل رقم هوية اللاعب',
            'id_number.min' => 'رقم هوية اللاعب قصير',
            'id_number.max' => 'رقم الهوية اللاعب طويل',
            'phone_number.required' => 'ادخل رقم جوال اللاعب',
            'phone_number.min' => 'رقم جوال اللاعب قصير',
            'phone_number.max' => 'رقم جوال اللاعب طويل'
        ]);
        
        $player = new player();
        $player->name =$request->input('name');
        $player->id_number =$request->input('id_number');
        $player->phone_number =$request->input('phone_number');
        $is_Saved = $player->save();
        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(player $player)
    {
        //
        return response()->view('loginn.editblayer',['player' => $player]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, player $player)
    {
        //
        $request->validate([
            'name' => 'required|min:5|max:50',
            'id_number' => 'required|min:0|max:9',
            'phone_number' => 'required|min:0|max:10'
        ],[
            'name.required'=>'ادخل اسم اللاعب',
            'name.min' => 'اسم اللاعب قصير',
            'name.max' => 'اسم اللاعب طويل',
            'id_number.required' => 'ادخل رقم هوية اللاعب',
            'id_number.min' => 'رقم هوية اللاعب قصير',
            'id_number.max' => 'رقم الهوية اللاعب طويل',
            'phone_number.required' => 'ادخل رقم جوال اللاعب',
            'phone_number.min' => 'رقم جوال اللاعب قصير',
            'phone_number.max' => 'رقم جوال اللاعب طويل'
        ]);
        $player->name=$request->input('name');
        $player->id_number = $request->input('id_number');
        $player->phone_number = $request->input('phone_number');
        $is_Saved = $player->save();
        session()->flash('message', $is_Saved ? "تم التعديل " : "فشل التعديل ");
        session()->flash('status',$is_Saved);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(player $player)
    {
        //
        $isDeleted = $player->delete();
        return response()->json([
            'icon'=> $isDeleted ?'success':'error',
            'title'=> $isDeleted ? ' تم الحذف':'deleted failed!'
        ], $isDeleted ? response::HTTP_OK : response::HTTP_BAD_REQUEST
    );

        // dd('destroy');
    }
}