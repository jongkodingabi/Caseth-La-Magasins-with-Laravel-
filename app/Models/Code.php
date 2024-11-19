<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'is_active',
        'discount_percentage',
        'expiry_date',
    ];

    public function isValid() 
    {
        return $this->is_active && $this->expiry_date >= now();
    }
}
