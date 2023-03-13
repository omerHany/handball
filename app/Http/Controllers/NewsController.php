<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = News::paginate(10);
        // dd($data);
        return view('form.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('loginn.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required|min:5',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'content'=> 'required'
        ], [
            'title.required' => 'ادخل عنوان الخبر',
            'title.min' => 'عنوان الخبر قصير',
            'image.required' => 'ادخل صورة الخبر ',
            'image.image' => 'ادخل  اللاعب ',
            'image.mimes' => ' صورة اللاعب ',
            'image.max' => 'ادخل صورة  ',
            'content.required' => 'ادخل الخبر',


        ]);
        if (!$validator->fails()) {
            $new = new News();
            $new->title = $request->input('title');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('News', $imageName, ['disk' => 'public']);
                $new->image = $image;
            }
            $new->content = $request->input('content');
            $isSaved = $new->save();
            return response()->json([
                'message' => $isSaved ? 'تم الاضافة بنجاح' : 'فشلت الاضافة!'
            ], $isSaved ? response::HTTP_OK : response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
        
        return response()->view('loginn.new_show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        // $news = News::findOrFail($id);
        return response()->view('loginn.new_edit', ['news' => $news]);
    }
     
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
        $validator = Validator($request->all(),
        [
            'title' => 'required|min:5',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'content' => 'required'
        ], [
            'title.required' => 'ادخل عنوان الخبر',
            'title.min' => 'عنوان الخبر قصير',
            'image.required' => 'ادخل صورة الخبر ',
            'image.image' => 'ادخل  اللاعب ',
            'image.mimes' => ' صورة اللاعب ',
            'image.max' => 'ادخل صورة  ',
            'content.required' => 'ادخل الخبر',

        ]);
        if (!$validator->fails()) {
            $news->title = $request->input('title');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
                $image = $file->storePubliclyAs('News', $imageName, ['disk' => 'public']);
                $news->image = $image;
            }
            $news->content = $request->input('content');
            $isSaved = $news->save();
            return response()->json([
                'message' => $isSaved ? 'تم التعديل بنجاح' : 'فشل التعديل !'
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
    public function destroy(News $news)
    {
        //
        $imageName = $news->image;

        $isDeleted = $news->delete();
        if ($isDeleted) {
         
            $imageDeleted = Storage::disk('public')->delete($imageName);
        }
        return response()->json(
            [
                'icon' => $isDeleted ? 'success' : 'error',
                'title' => $isDeleted ? ' تم الحذف' : 'deleted failed!'
            ],
            $isDeleted ? response::HTTP_OK : response::HTTP_BAD_REQUEST
        );

    }
}
