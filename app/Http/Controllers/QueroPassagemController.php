<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchTravelsRequest;
use App\Services\QueroPassagemImpl as QueroPassagemService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


class QueroPassagemController extends Controller
{
    private $queroPassagemService;

    public function __construct()
    {
        $this->queroPassagemService = new QueroPassagemService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index', [
            'stops' => $this->queroPassagemService->getAllStops(),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(SearchTravelsRequest $request)
    {
        $filterParams = [
            "from" => $request->from,
            "to" => $request->to,
            "travelDate" => Carbon::createFromFormat('d/m/Y',$request->travelDate)->format('Y-m-d'),
        ];
        $travels = $this->queroPassagemService->getTravels($filterParams);
        return Redirect::route("home")->with('travels',compact('travels'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => $this->queroPassagemService->getSeats($id)
        ], 200);
    }
}
