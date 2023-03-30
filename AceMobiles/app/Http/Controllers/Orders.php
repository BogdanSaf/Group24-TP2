<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Orders extends Controller
{
    public function index(){
        $orders = Order::where('userIDFK', Auth::id());
        return view('user', ['orders' => $orders]);
    }
}
