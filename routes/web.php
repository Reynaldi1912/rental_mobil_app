<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilPribadiController;
use App\Http\Controllers\MobilUmumController;


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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('mobil-pribadi', MobilPribadiController::class);
// Route::resource('mobil-umum', MobilUmumController::class);

Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::resource('mobil-pribadi', MobilPribadiController::class);
    Route::resource('mobil-umum', MobilUmumController::class);
});

