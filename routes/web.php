<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn',function(){
    return "Hello PZN";
});

//redirect
Route::redirect('/youtube','/pzn');

//fallBack
Route::fallback(function (){
   return "Page Not Found";
});

//View
Route::View('/hello','hello',["name"=>"Asep"]);

//cara lain pemanggilan view
Route::get('/hello-again',function (){
    return view('hello',['name'=>"Asep"]);
});

//view nested
Route::get('/hello-world',function(){
    return view('hello.hello-word',['name'=>"Riki"]);
});

//Route parameter
Route::get('products/{id}',function ($productId){
   return "Product $productId";
})->name('product.detail');

Route::get('/products/{id}/item/{item}',function ($productId,$itemId){
   return "Product Id = $productId item id $itemId";
})->name('product.item.detail');

// Routing Regular Expressions Constrain
Route::get('/categories/{id}',function($categoryId){
return "Categories: $categoryId";
})->where('id','[0-9]+')->name('category.detail');


//Route Optional Parameter
Route::get('/users/{id?}',function ($userId='404'){
   return "User: $userId";
})->name('user.detail');

//Route conflict
Route::get('/conflict/{name}',function($name){
return "Conflict $name";
});

Route::get('/conflict/eko',function(){
    return "Conflict Eko Khannnedy";
});

//named Route
Route::get('/produk/{id}',function ($id){
   $link = route('product.detail',['id'=>$id]);
   return $link;
});
Route::get('/produk-redirect/{id}',function ($id){
 return redirect()->route('product.detail',['id'=>$id]);
});
//controller request
Route::get('/controller/hello/request',[\App\Http\Controllers\HelloController::class,'request']);

//Controller
Route::get('/controller/hello',[\App\Http\Controllers\HelloController::class,'hello']);
Route::get('/controller/hello/{name}',[\App\Http\Controllers\HelloController::class,'hello']);

//Request Input
Route::get('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);

// request input nested
Route::post('/input/hello/nested',[\App\Http\Controllers\InputController::class,'helloNested']);


// get request all
Route::post('/input/hello/helloInput',[\App\Http\Controllers\InputController::class,'helloAllInput']);

// input array
Route::post('/input/hello/array',[\App\Http\Controllers\InputController::class,'arrayInput']);

// input query
Route::get('/input/hello/query',[\App\Http\Controllers\InputController::class,'inputQuery']);

// input type
Route::post('/input/hello/type',[\App\Http\Controllers\InputController::class,'inputType']);

// filter onli
Route::post('/input/hello/filterOnly',[\App\Http\Controllers\InputController::class,'filterOnly']);

// filter Except
Route::post('/input/hello/filterExcept',[\App\Http\Controllers\InputController::class,'filterExcept']);

// filter merge
Route::post('/input/hello/merge',[\App\Http\Controllers\InputController::class,'filterMerge']);

// upload file
Route::post('/file/upload',[\App\Http\Controllers\FileUploadController::class,'upload']);
