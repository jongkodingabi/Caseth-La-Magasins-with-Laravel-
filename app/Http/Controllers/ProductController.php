<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCasing()
    {
        // Mengambil data produk berdasarkan kategori 'casing'
        $products = Product::where('category', 'casing')->paginate(6);

        // Mengirim data produk ke view 'products.casing'
        return view('products.casing', compact('products'));
    }




    public function showPhoneStrap() {
        //produk berdasarkan kategori
        $products = Product::where('category', 'phonestrap')->paginate(6);
        //View dengan data produk
        return view('products.phoneStrap', compact('products'));
    }

    public function showBoquette() {
        //produk berdasarkan kategori
        $products = Product::where('category', 'bouquet')->get();

        //View dengan data produk
        return view('products.boquette', compact('products'));
    }
}
