<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware(['auth','verified'])->prefix('profile')->group( function () {
    Route::get('/', [ProfileController::class,'show'])->name('profile.show');
    Route::post('/info',[ProfileController::class,'store'])->name('profile.store');
    Route::post('/password',[ProfileController::class,'password'])->name('profile.password');
});

require __DIR__.'/auth.php';
