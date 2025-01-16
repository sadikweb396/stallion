<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\Auth\RegisterController;
use App\Http\Controllers\Owner\Auth\LoginController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\StallionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Owner\MareController;
use App\Http\Controllers\Owner\ProgenyController;
use App\Http\Controllers\Owner\PedigreeController;
use App\Http\Controllers\Owner\FollowController;
use App\Http\Controllers\subscriptionController;


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

Route::group(['middleware' => ['auth']], function(){
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::prefix('owner')->name('owner.')->group(function (){
    // stallion 
    Route::get('stallions',[StallionController::class,'index']);
    Route::get('Stallion/{id}',[StallionController::class,'edit'])->name('stallion');
    Route::get('stallion/create',[StallionController::class,'create'])->name('stallion.create');
    Route::post('stallion/store',[StallionController::class,'store'])->name('stallion.store');
    Route::post('stallion/update',[StallionController::class,'update'])->name('stallion.update');
    Route::post('semen-contract',[StallionController::class,'semencontractstore'])->name('semen-contract');
    Route::post('progeny/create',[ProgenyController::class,'progeny'])->name('progeny.create');
   
    Route::post('stallion-image',[StallionController::class,'stallionimagestore'])->name('stallion-image');
    Route::post('stallion-video',[StallionController::class,'stallionvideostore'])->name('stallion-video');
    Route::get('progeny/edit/{id}',[ProgenyController::class,'progenyEdit']);
    Route::post('progeny/update',[ProgenyController::class,'progenyUpdate'])->name('progeny-update');
    
    // Mare
    Route::get('mares',[MareController::class,'index']);
    Route::get('mares/create',[MareController::class,'create'])->name('mare.create');
    Route::post('mare/store',[MareController::class,'store'])->name('mare.store');
    Route::get('mare/{id}',[MareController::class,'edit'])->name('mare');
    Route::post('mare/update',[MareController::class,'update'])->name('mare.update');
    Route::post('mare-image',[MareController::class,'mareimagestore'])->name('mare-image');
    Route::post('mare-video',[MareController::class,'marevideostore'])->name('mare-video');
    Route::post('semen-contract',[StallionController::class,'semencontractstore'])->name('semen-contract');
    
    // progeny Image
    Route::get('mare/progeny/{id}',[ProgenyController::class,'progenyImage']);
    Route::post('progeny-image',[ProgenyController::class,'progenyImageStore'])->name('progeny-image');

    // progeny video
    Route::get('stallion/progeny/{id}',[ProgenyController::class,'progenyImage']);
    Route::post('progeny-video',[ProgenyController::class,'progenyVideoStore'])->name('progeny-video');

    Route::post('pedigree-stallion',[PedigreeController::class,'pedigreeStallion'])->name('pedigree-stallion');

    Route::post('pedigree-mare',[PedigreeController::class,'pedigreeMare'])->name('pedigree-mare'); 
    //
    Route::post('checkbox-update',[ProgenyController::class,'check'])->name('checkbox-update');
    
});
    // follow stallion owner
    Route::get('followed/stallions',[FollowController::class,'followstallion']);

    // follow mare owner
    Route::get('followed/mares',[FollowController::class,'followmare']);
  
});
Route::post('paymentregister',[RegisterController::class,'paymentregister'])->name('paymentregister');
Route::post('paymentstallion',[StallionController::class,'stripePost'])->name('paymentstallion');
Route::post('paymentmare',[MareController::class,'paymentMare'])->name('paymentmare');

Route::get('renew-subscription/payment',[subscriptionController::class,'subscriptionPayment']);

Route::post('renew-subscription-payment',[subscriptionController::class,'subscriptionPaymentStore'])->name('renew-subscription-payment');

 