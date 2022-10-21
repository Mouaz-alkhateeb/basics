<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\traits\UploadFileTrait;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    use UploadFileTrait;
    public function show()
    {
        return view('upload');
    }
    public function store(Request $request)
    {
        $path = $this->uploadFile($request, 'users');
        Image::create([
            'path' => $path,
        ]);
        return "تم حفظ مسار الصورة بنجاح";
    }
    public function view()
    {
        $images = Image::all();
        //dd($images);
        return view('posts.index', compact('images'));
    }
}
