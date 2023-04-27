<?php

namespace App\Services;


interface QueroPassagem
{
    public function getTravels($filterParams);
    public function getSeats($id);
    public function getAllStops();
}
