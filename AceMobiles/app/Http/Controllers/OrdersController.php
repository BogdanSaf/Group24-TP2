<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\BasketOrderContent;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::where('userIDFK', Auth::id())->get();
        return view('user.OrderHistory', ['orders' => $orders]);
    }

    public function placeOrder(){
        $basket = Basket::where('userIDFK', Auth::id())->get();
        $order = new Order();
        $order->userIDFK = Auth::id();
        $order->orderDate = Carbon::now();
        $order->arrivalDate = Carbon::now()->addDays(7);
        $order->status = 'Pending';
        $order->save();

        foreach($basket as $basket_item){
            Product::where('productID', $basket_item->productIDFK)->decrement('productStock', $basket_item->quantity);
            Product::where('productID', $basket_item->productIDFK)->increment('productsold', $basket_item->quantity);
            $basket_order_contents = new BasketOrderContent();
            $basket_order_contents->orderIDFK = $order->orderID;
            $basket_order_contents->productIDFK = $basket_item->productIDFK;
            $basket_order_contents->quantity = $basket_item->quantity;
            $basket_order_contents->save();
            $basket_item->delete();
        }

        return redirect('/products')->with('success', 'Order Placed Successfully! Thank you for shopping with us!');
    }

    public function getSpecificOrder($id){
        $order = Order::find($id);
        $order_contents = BasketOrderContent::where('orderIDFK', $id)
        ->join('products', 'basket_order_contents.productIDFK', '=', 'products.productID')
        ->get();
        return view('user.viewOrderContents', ['order_contents' => $order_contents]);
    }
}
