<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    use HasFactory;

    protected $tables = 'status_pesanans';

    protected $fillable = [
        'user_id',
        'total_all',
        'status',
        'alamat',
        'tipe_hp',
        'masukkan',
        'bukti_pembayaran',
        'destination'
    ];

    public function statusPesanan()
{
    return $this->hasOne(StatusPesanan::class, 'order_id');
}

public function cart()
{
    return $this->belongsTo(Cart::class, 'order_id');
}


}
