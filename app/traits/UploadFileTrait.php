<?php

namespace App\traits;

use Illuminate\Http\Request;

trait UploadFileTrait
{
    public function uploadFile(Request $request, $folder)
    {
        $img = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs($folder, $img, 'public');
        return $path;
    }
}
