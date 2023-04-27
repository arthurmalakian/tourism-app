<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QueroPassagemImpl implements QueroPassagem
{

    public function getTravels($filterParams)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => "Basic " . base64_encode(config("queropassagem.user") . ":" . config("queropassagem.password"))
        ])->post(
            config("queropassagem.url") . "/new/search",
            [
                "from" => $filterParams['from'],
                "to" => $filterParams['to'],
                "travelDate" => $filterParams['travelDate'],
                "affiliateCode" => config("queropassagem.code"),
                "include-connections" => false
            ]
        );
        return $response->json();
    }

    public function getSeats($id)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => "Basic " . base64_encode(config("queropassagem.user") . ":" . config("queropassagem.password"))
        ])->post(
            config("queropassagem.url") . "/new/seats",
            [
                "travelId" => "1_3fe7f88636fb1bebc68f33deca77b738",
            ]
        );
        return $response->json();
    }

    public function getAllStops()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => "Basic " . base64_encode(config("queropassagem.user") . ":" . config("queropassagem.password"))
        ])->get(config("queropassagem.url") . "/stops");
        return $response->json();
    }
}
