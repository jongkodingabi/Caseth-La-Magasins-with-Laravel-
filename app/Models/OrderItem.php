<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'order_items';

    // Tentukan atribut yang boleh diisi (mass assignable)
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke Product (misalnya jika kamu punya model Product)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
