<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function showCheckout()
{
    // Ambil data yang sudah disimpan di session untuk ditampilkan di halaman checkout
    $cartItems = session('cartItems');
    $totalPrice = session('totalPrice');
    $totalAll = session('totalAll');
    $origin = session('origin');
    $origin_name = session('origin_name');
    $destination_name = session('destination_name');
    $destination = session('destination');
    $courier = session('courier');
    $courierServices = session('courierServices');
    $masukkan = session('masukkan');
    $alamat = session('alamat');
    $tipe_hp = session('tipe_hp');

    return view('checkout', compact('cartItems', 'totalPrice', 'totalAll', 'origin', 'destination', 'courier', 'courierServices', 'masukkan', 'alamat', 'tipe_hp'));
}
    
   public function storeCheckout(Request $request)
{
    // Validasi data dari form checkout
    $validated = $request->validate([
        'payment_photo' => 'required|image',
        'service' => 'required|string', // Misal: kurir service yang dipilih
    ]);

    // Ambil data yang disimpan di session
    $cartItems = session('cartItems');
    $originName = session('origin_name');
    $destinationName = session('destination_name');

    // Simpan data order ke tabel 'orders'
    $order = Order::create([
        'user_id' => Auth::id(),
        'origin' => $originName,
        'destination' => $destinationName,
        'courier' => session('courier'),
        'service' => $validated['service'],
        'weight' => session('weight'),
        'tipe_hp' => session('tipe_hp'),
        'masukkan' => session('masukkan'),
        'alamat' => session('alamat'),
        'total_price' => session('totalAll'),
        'payment_photo' => $request->file('payment_photo')->store('payment_photos'),
    ]);

    // Simpan data produk dari cart ke tabel 'order_items'
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }


    // Hapus produk yang sudah diproses dari cart (jika diinginkan)
    Cart::where('user_id', Auth::id())->delete();

    // Redirect ke halaman konfirmasi atau halaman lain setelah checkout sukses
    return redirect()->route('home')->with('success', 'Pesanan berhasil dikirim');
}
}
