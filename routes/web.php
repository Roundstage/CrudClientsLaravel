<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/client', function () {
    $clients = Http::timeout(3)->get('http://0.0.0.0:80/api/client')->json();
    return view('client', ['clientsArray'=>$clients]);
});
Route::post('/client/create', function (Request $request) {
    Http::post('http://localhost:80/api/client', $request->all());
    return Redirect('/client');
});
Route::post('/client/update', function(Request $request){
    Http::put('http://localhost:80/api/client', $request->all());
    return Redirect('/client');
});
Route::post('/client/delete', function(Request $request){
    Http::delete('http://localhost:80/api/client', $request->all());
    return Redirect('/client');
});

