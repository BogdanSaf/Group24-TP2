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



// Login & Regtser Page and Functions
Route::get('/login', function () {
    return view('LoginPage');
});

Route::view('/register', 'RegisterPage') -> name('ReturnRegisterPageView');


Route::get('/contactus', function () {
    return view('contactus');
});