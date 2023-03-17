<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthFunctions;
use App\Http\Controllers\ProductController;

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
    return view('user/home');
});



//Auth Routes 
Route::get('/login', function () {
    return view('LoginPage');
});

Route::get('/logout',[AuthFunctions::class, 'logout']);

Route::view('/login', 'LoginPage') -> name('ReturnLoginPageView');

Route::view('/register', 'RegisterPage') -> name('ReturnRegisterPageView');

Route::post('register',[AuthFunctions::class, 'register']) -> name('RegisterUser');

Route::post('login',[AuthFunctions::class, 'login']) -> name('LoginUser');

Route::get('/products',[ProductController::class, 'returnHomeView']);


// Contact Us Page
Route::get('/contactus', function () {
    return view('user/contactus');
});



//About us
Route::get('/aboutus', function () {
    return view('user/acemobileabout');
});