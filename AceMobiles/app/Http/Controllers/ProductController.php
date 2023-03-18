<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}

