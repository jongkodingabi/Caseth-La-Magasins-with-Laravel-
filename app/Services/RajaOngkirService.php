<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService {

    private $apiKey;

    public function __construct() {
        $this->apiKey = config('services.rajaongkir.api_key');
    }

    public function getProvinces() {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get('https://api.rajaongkir.com/starter/provinces');

        return $response->json(); // Kembalikan data dalam format JSON

    }

    }

?>
