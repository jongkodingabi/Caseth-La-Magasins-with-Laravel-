<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index() {
        return view('search');
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $category = $request->input('category');


        // Melakukan query dengan filter
        $products = Product::query()
        ->when($keyword, function ($query, $keyword) {
            return $query->where('product', 'like', '%' . $keyword . '%');
        })
        ->paginate(4);

        return view('search', compact('products'));
    }
}
