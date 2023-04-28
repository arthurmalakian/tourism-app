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
                "travelId" => $id,
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

    public function getStop($stop_code)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => "Basic " . base64_encode(config("queropassagem.user") . ":" . config("queropassagem.password"))
        ])->get(config("queropassagem.url") . "/stops/".$stop_code);
        return $response->json();
    }
}
