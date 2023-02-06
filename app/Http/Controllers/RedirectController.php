<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;

class RedirectController extends Controller
{
    public function redirectTo():string{
        return "redirect to";
    }
    public function redirectFrom(Request $request):RedirectResponse{
        return redirect('/redirect/to');
    }

    public function redirectName(Request $request):RedirectResponse{
        return redirect()->route('redirect-hello',['name'=>"Riki"]);
    }

    public function redirectHello(string $name):string{
        return "Hello $name";
    }

    //    Redirect action controller
    public function redirectActionController(Request $request):RedirectResponse{
           return redirect()->action([RedirectController::class,'redirectHello'],['name'=>'Jajang']);
    }

    // redirect external domain (away)
    public function redirectAway(Request $request):RedirectResponse{
        return redirect()->away('https://www.youtube.com/watch?v=2NZe05C0OCQ');
    }







}
