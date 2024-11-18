<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{

    public function index() {
        return view('cart');
    }


    //Menampilkan daftar item di keranjang
    public function cartList()
    {

    //Mengambil data keranjang dari database berdasarkan user yang sedang login
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $totalPrice = 0;
    $totalItems = $cartItems->sum('quantity');

    foreach ($cartItems as $item) {
        $totalPrice += $item->product->price * $item->quantity;
    }

    $response = Http::withHeaders([
        'key' => '316e4f0570ad8482913c3cd334873531'
            ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];
        $cost = null;

        return view('cart',  ['cities' => $cities, 'cost' => $cost], compact('cartItems', 'totalPrice', 'totalItems'));

    }


    // Menambahkan produk ke keranjang
    public function addToCart(Request $request) {

        $product = Product::find($request->id); //cari produk berdasarkan ID

        if(!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

            // Ambil cart dari relasi, atau buat cart baru jika belum ada
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();

                // Jika produk sudah ada di cart, tambahkan quantity-nya
                if ($cartItem) {
                // Jika produk sudah ada di cart, tambahkan quantity-nya
                    $cartItem->quantity += 1;
                    $cartItem->save();

                } else {
                // Jika produk belum ada di cart, tambahkan dengan quantity 1
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => 1, // default quantity
                    'picture' => $product->picture, // assuming you store product picture in cart
                ]);

            }
            return redirect()->back()->with('success', 'Product added to cart.');
        }


        // Memperbarui quantity produk di keranjang
        public function updateCart(Request $request) {

        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $request->id)->first();

        if($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            } else {
                Cart::create([
                    'product_id' => $request->id,
                    'quantity' => $request->quantity
                ]);
            }
            return redirect()->route('cart.list')->with('success', 'Cart updated successfully!');

            return redirect()->back()->with('error', 'Cart item not found.');

    }


    public function removeCart(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $request->id)->first();

        if($cartItem) {
            $cartItem->delete();

            return redirect()->route('cart.list')->with('success', 'Item removed from cart!');
            }

            return redirect()->back()->with('error', 'Cart item not found.');
        }


    public function clearAllCart()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.list')->with('success', 'All items cleared from cart!');
    }


    // Menampilkan cart dengan provinsi
    public function checkCost(Request $request) {

        // Ambil data keranjang
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalPrice = 0;
        $totalItems = $cartItems->sum('quantity');
    
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;
    
        }

        $response = Http::withHeaders([
            'key' => '316e4f0570ad8482913c3cd334873531'
                ])->get('https://api.rajaongkir.com/starter/city');


        $responseCost = Http::withHeaders([
            'key' => '316e4f0570ad8482913c3cd334873531'
                ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $request->origin,
                    'destination' => $request->destination,
                    'weight' => $request->weight,
                    'courier' => $request->courier,
                ]);

            $cities = $response['rajaongkir']['results'];
            
            $cost = $responseCost['rajaongkir'];

            return view('cart',['cities' => $cities, 'cost' => $cost, 'cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'totalItems' => $totalItems]);

        }
}
