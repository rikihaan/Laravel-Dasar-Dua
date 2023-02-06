<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request):Response{
        return response("Hello Response");
    }

    // header
    public function header(Request $request):Response{
        $body =["firstName"=>"Asep","lastName"=>"Riki"];
      return  response(json_encode($body),200)->withHeaders(['Author'=>'Asep Riki','App'=>'Belajar Laravel'])
            ->header('Content-Type','Application/json');
    }

    public function responseView(Request $request):Response{
        return response()->view('hello',['name'=>"Asep Riki"]);
    }

    public function responseJson(Request $request):JsonResponse{
        return response()
            ->json(['firstName'=>'Asep','lastName'=>'Riki']);
    }

    public function responseFile(Request $request):BinaryFileResponse{
        return response()
            ->file(storage_path('app/public/pictures/riki.png'));
    }

    public function responseDownload(Request $request):BinaryFileResponse{
        return response()
            ->download(storage_path('app/public/pictures/riki.png'));
    }
}
