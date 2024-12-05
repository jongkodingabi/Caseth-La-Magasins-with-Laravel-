<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $tables = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'quantity',
    ];

    // Relasi ke model user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //Relasi ke model produc
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
