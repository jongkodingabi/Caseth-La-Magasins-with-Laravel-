<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneStrapController extends Controller
{
    public function index(){
        return view('products.phoneStrap');
    }
}
