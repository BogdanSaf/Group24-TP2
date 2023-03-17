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
}
