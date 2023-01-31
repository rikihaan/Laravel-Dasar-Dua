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
});

Route::get('/products/{id}/item/{item}',function ($productId,$itemId){
   return "Product Id = $productId item id $itemId";
});

// Routing Regular Expressions Constrain
Route::get('/categories/{id}',function($categoryId){
return "Categories: $categoryId";
})->where('id','[0-9]+');

//Route Optional Parameter
Route::get('/users/{id?}',function ($userId='404'){
   return "User: $userId";
});

//Route conflict
Route::get('/conflict/{name}',function($name){
return "Conflict $name";
});

Route::get('/conflict/eko',function(){
    return "Conflict Eko Khannnedy";
});

