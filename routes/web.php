<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilPribadiController;
use App\Http\Controllers\MobilUmumController;
use App\Http\Controllers\StatusMobilPribadiController;
use App\Http\Controllers\StatusMobilUmumController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\sewakanController;
use App\Http\Controllers\sewakan1Controller;




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
Route::get('/frofile/{id}', [App\Http\Controllers\HomeController::class, 'frofile'])->name('frofile');
Route::post('/frofile', [App\Http\Controllers\HomeController::class, 'update_frofile'])->name('update_frofil');


Route::resource('mobil-pribadi', MobilPribadiController::class);
Route::resource('mobil-umum', MobilUmumController::class);

Route::resource('status/kendaraan-pribadi', StatusMobilPribadiController::class);
Route::resource('status/kendaraan-umum', StatusMobilUmumController::class);

Route::resource('pengguna', penggunaController::class);
Route::resource('sewa', sewakanController::class);
Route::resource('sewa1', sewakan1Controller::class);


Route::get('/pengguna-sekarang', [App\Http\Controllers\penggunaController::class, 'index_all'])->name('index_all');



// Route::resource('mobil-pribadi', MobilPribadiController::class);
// Route::resource('mobil-umum', MobilUmumController::class);

Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
   
});

Route::group(['middleware' => ['auth','ceklevel:user']], function(){
    
});

