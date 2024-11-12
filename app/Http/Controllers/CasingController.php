<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CasingController extends Controller
{
    public function index(){
        return view('products.casing');
    }
}
