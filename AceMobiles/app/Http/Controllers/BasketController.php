<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\users;
use App\Models\basket_order_contents;
use App\Models\baskets;
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
    ->join('products', 'productIDFK', "=")
    ->where('userIDFK', '=', Auth::id())
    ->get();
       
    return view('user/basket') -> with('basket', $basket);

}

public function getInfo(){
    $basketInfo = DB:: table('basket_contents')
        ->join('basket', 'userIDFK', "=", basketID)
        ->join('products', 'productIDFK', "=", "id")
        ->where('userIDFK', '=', Auth::id())
        ->get();

return view('user/checkout') ->with('basketInfo', $basketInfo);

}


public function removeFromBasket(Request $request) {
$basketID = $request->input('basketContentID');
$basket= BasketContents::where('basketContentID', $basketID)->first();
$basket->delete();
return redirect()->back();

}

} 





