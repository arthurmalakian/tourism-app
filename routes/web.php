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
Route::post('/', [QueroPassagemController::class,'search'])->name('search');

require __DIR__.'/auth.php';
