<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueroPassagemController;
use App\Services\QueroPassagemImpl;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QueroPassagemController::class,'index'])->name('home');
Route::post('/search', [QueroPassagemController::class,'search'])->name('search');

Route::get('/test', function () {
    $queroPassagem = new QueroPassagemImpl();
    dd($queroPassagem->getTravels(null),$queroPassagem->getAllStops());
    return $queroPassagem->getBus(null);
});

require __DIR__.'/auth.php';
