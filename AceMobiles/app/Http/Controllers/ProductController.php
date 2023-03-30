<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket_Order_Contents;
use App\Models\Basket;
use App\Cart;

use Session;

class ProductController extends Controller
{
    //
    public function returnHomeView() {
        return view('user.products', ['products' => Product::all()]);
    }

    public function returnAppleProducts() {
        return view('user.products', ['products' => Product::where('productBrand', 'Apple')->get()]);
    }

    public function returnSamsungProducts() {
        return view('user.products', ['products' => Product::where('productBrand', 'Samsung')->get()]);
    }

    public function returnOppoProducts() {
        return view('user.products', ['products' => Product::where('productBrand', 'Oppo')->get()]);
    }
    
    public function returnSonyProducts() {
        return view('user.products', ['products' => Product::where('productBrand', 'Sony')->get()]);
    }

    public function returnGoogleProducts() {
        return view('user.products', ['products' => Product::where('productBrand', 'Google')->get()]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('productName', 'LIKE', "%$query%")->get();
    
        return view('user/products', compact('products'));
    }

    public function specificProduct($id) {
        $product = Product::find($id);
        return view('user.detail', ['product' => $product]);
    }

    public function addToBasket(Request $request) {
		if(Auth::check()){
			$productID = $request->input('id');
			$productPrice = DB::table('products')->where('productID', $request->input('id'))->value('productPrice');
			$tempID = Auth::id();
			$baskets = new Basket();
			$baskets->userIDFK = $tempID;
			$baskets->productIDFK = $productID;
			//$basket->orderfk = 1;
			$baskets->quantity = 1;
			$baskets->totalPrice = $productPrice;

			$baskets->save();

			return redirect()->back();

		} else {
			return back()->withErrors(['errors'=>'You must be logged in to add to basket']);
		}

		

	}




}

