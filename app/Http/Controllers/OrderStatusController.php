<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderStatusController extends Controller
{
    public function index() {
        return view('orderStatus');
    }

    public function showOrder(){
    $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();


        return view('orderStatus', compact('orders'));
    }
}


