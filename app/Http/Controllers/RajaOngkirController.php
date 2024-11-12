<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaOngkirService;

class RajaOngkirController extends Controller
{
    protected $rajaOngkirService;

    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }

    public function getProvinces() {
        $provinces = $this->rajaOngkirService->getProvinces();
        return $provinces['rajaongkir']['results'] ?? [];
    }

    public function showProvince() {
        $provinces = $this->getProvinces();
        return view('cart', ['provinces' => $provinces]);
    }

    public function showCartWithProvinces() {

        // Mengirim data provinsi ke halaman view
        $provinces = $this->getProvinces();
        return view('cart', ['provinces' => $provinces]);
    }
}
