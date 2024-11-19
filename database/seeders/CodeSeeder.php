<?php

namespace Database\Seeders;

use App\Models\Code;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Code::create([
            'code' => 'DISKON10',
            'is_active' => true,
            'discount_percentage' => 10,
            'expiry_date' => now()->addDays(7),
        ]);

        Code::create([
            'code' => 'PROMO20',
            'is_active' => true,
            'discount_percentage' => 20,
            'expiry_date' => now()->addDays(14),
        ]);
    }
}
