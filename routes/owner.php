<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\Auth\RegisterController;
use App\Http\Controllers\Owner\Auth\LoginController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\StallionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\MareController;
use App\Http\Controllers\Owner\ProgenyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('owner/register',[RegisterController::class,'showRegisterForm'])->name('owner.register');
Route::post('owner/register',[RegisterController::class,'register'])->name('owner.register.store');

Route::get('owner/login',[LoginController::class,'showLoginForm'])->name('owner.login');
Route::post('owner/login',[LoginController::class,'login'])->name('owner.login.store');
Route::post('logout',[LoginController::class,'logout'])->name('owner.logout');

Route::group(['middleware' => ['auth']], function() {
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// Route::get('stallion/create',[StallionController::class,'create']);
// Route::post('stallion/store',[StallionController::class,'store'])->name('owner.stallion.store');
Route::prefix('owner')->name('owner.')->group(function (){
    Route::get('stallions',[StallionController::class,'index']);
    Route::get('Stallion/{id}',[StallionController::class,'edit'])->name('stallion');
    Route::get('stallion/create',[StallionController::class,'create'])->name('stallion.create');
    Route::post('stallion/store',[StallionController::class,'store'])->name('stallion.store');
    Route::post('stallion/update',[StallionController::class,'update'])->name('stallion.update');
    Route::post('semen-contract',[StallionController::class,'semencontractstore'])->name('semen-contract');
    Route::post('progeny/create',[ProgenyController::class,'progeny'])->name('progeny.create');
   
    Route::post('stallion-image',[StallionController::class,'stallionimagestore'])->name('stallion-image');
    Route::post('stallion-video',[StallionController::class,'stallionvideostore'])->name('stallion-video');
    Route::get('progeny/edit/{id}',[StallionController::class,'progenyEdit']);
    Route::post('progeny/update',[StallionController::class,'progenyUpdate'])->name('progeny-update');
    // Mare
    Route::get('mares',[MareController::class,'index']);
    Route::get('mares/create',[MareController::class,'create'])->name('mare.create');
    Route::post('mare/store',[MareController::class,'mareDetails'])->name('mare.store');
    Route::get('mare/{id}',[MareController::class,'edit'])->name('mare');
    Route::post('mare/update',[MareController::class,'update'])->name('mare.update');
    Route::post('mare-image',[MareController::class,'mareimagestore'])->name('mare-image');
    Route::post('mare-video',[MareController::class,'marevideostore'])->name('mare-video');
    Route::post('semen-contract',[StallionController::class,'semencontractstore'])->name('semen-contract');
    Route::get('progeny/{id}',[ProgenyController::class,'progenyImage']);
    Route::post('progeny-image',[ProgenyController::class,'progenyImageStore'])->name('progeny-image');
});
});

Route::post('stripe',[StallionController::class,'stripePost'])->name('stripe.post');

Route::post('stripe/mare/store',[MareController::class,'stripePost'])->name('mare.stripe.store');