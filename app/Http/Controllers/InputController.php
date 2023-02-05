<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request):String{
        return "Hello ".$request->input('name');
    }

    //Nested input
    public function helloNested(Request $request):string{
        return "Hello ".$request->input('name.first');
    }

    //mengambil semua input
    public function helloAllInput(Request $request):string{
        $input = $request->input();
        return json_encode($input);
    }
    //get array input
    public function arrayInput(Request $request):string{
        $names = $request->input('products.*.names');
        return json_encode($names);
    }

    // get query parameter
    public function inputQuery(Request $request):string{
        return "Hello ".$request->query('name');
    }

    public function inputType(Request $request):string{
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birt_day= $request->date('birt_day','Y-m-d');
        return json_encode([
            'name'=>$name,
            'married'=>$married,
            'birt-day'=>$birt_day->format('Y-m-d')
        ]);
        }

//        filter only
    public function filterOnly(Request $request):string{
        $name = $request->only(['name.first','name.last']);
        return json_encode($name);
    }

    // filter except
    public function filterExcept(Request $request):string{
        $user = $request->except(['admin']);
        return json_encode($user);
    }

    // filter merge
    public function filterMerge(Request $request):string{
        $request->merge(['admin'=>false]);
        $name = $request->input();
        return json_encode($name);
    }

}
