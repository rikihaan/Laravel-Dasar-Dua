<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request):string{
        $pictures = $request->file("picture");
        $pictures->storePubliclyAs('pictures',$pictures->getClientOriginalName(),'public');
        return $pictures->getClientOriginalName();
    }
}
