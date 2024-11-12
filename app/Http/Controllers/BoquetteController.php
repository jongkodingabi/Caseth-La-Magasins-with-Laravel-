<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoquetteController extends Controller
{
    public function index(){

        return view('products.boquette');
    }
}
