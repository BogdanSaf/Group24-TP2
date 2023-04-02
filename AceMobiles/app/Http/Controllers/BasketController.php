<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\users;
use App\Models\basket_order_contents;
use App\Models\Basket;
use App\Models\employees;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\BasketOps;


class BasketController extends Controller

{

//adding a product to the basket: 
public function index() {

    $basket = DB::table('baskets')
    ->join('products', 'productIDFK', "=", "productID")
    ->where('userIDFK', '=', Auth::id())
    ->get();
       
    return view('user/basket') -> with('basket', $basket);

}

public function getInfo(){
    $basketInfo = DB:: table('baskets')
        ->join('users', 'userIDFK', "=", 'userID')
        ->join('products', 'productIDFK', "=", "productID")
        ->where('userIDFK', '=', Auth::id())
        ->get();

return view('user/checkout') ->with('basketInfo', $basketInfo);

}


public function removeFromBasket(Request $request) {
$productId = $request->input('productID');
$basket = Basket::where('productIDFK', $productId) ->where('userIDFK', Auth::id()) ->first() ->delete();
return redirect()->back()->with('successRemove', 'Product removed from basket!');

}

}






