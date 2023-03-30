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


class BasketController extends Controller

{

//adding a product to the basket: 
public function index(){

    $basket = DB::table('baskets')
    ->join('products', 'productIDFK', "=", "productID")
    ->where('userIDFK', '=', Auth::id())
    ->get();
       
    return view('user/basket') -> with('basket', $basket);

}
    public function addProduct (Request $request)
    {


    
    $productIDFK = $request ->input('productIDFK');
    $quantity = $request ->input('quantity');

    if(Auth::check())
    {
        $prod_check = Product:: where('id, $productIDFK')->first();

        if($prod_check)

        {

            //display items in basket

            if(Basket::where('productIDFK', $productIDFK)->where(userIDFK, Auth::id())->exists())
        {
            
            return reponse() ->json(['status' => $prod_check->name."Already in basket"]);
    

            
    }


else

{

    //or create a new basket with products
    $productIDFK = new Basket();
    $productIDFK->productIDFK = $productIDFK;
    $productIDFK->userIDFK = Auth::id();
    $productIDFK->quantity = $quantity;
    $productIDFK->save();
    return response()->json(['status' => $prod_check -> name. "Successfully added item"]);

    /* public function getInfo(){
        $basketInfo = DB::table('basket_contents')
                    ->join('basket', 'basketck', "=", "basketID")
                    ->join('products', 'productck', "=", "id")
                    ->where('basketck', '=', Auth::id())
                    ->get(); */

}

}

    }

// else
{

    return response() ->json(['status' =>"Login to Continue"]);

    }
}

public function removeFromBasket(Request $request) {
    $basketID = $request -> input('basket_order_contentsid');
    $baskets = BasketContents:: where ('basket_order_contentsid' , $basketID) ->first();
    $baskets ->delete();
    return redirect()->back();

}

} 