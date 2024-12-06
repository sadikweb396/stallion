<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\StallionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\MareController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Frontend\PhotographerController;
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
 // Auth::routes();
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('stallions',[StallionController::class,'stallion']);
Route::get('single-stallion/{slug}',[StallionController::class,'singleStallion'])->name('single-stallion');
Route::get('stallionlist',[StallionController::class,'stallionlist'])->name('stallionlist');
Route::get('mares',[MareController::class,'mare']);
Route::get('single-mare/{slug}',[MareController::class,'signleMare']);

// follow user route
Route::post('follow/{stallionId}', [FollowController::class, 'follow'])->name('follow');
// unfollow user route
Route::post('unfollow/{stallionId}', [FollowController::class, 'unfollow'])->name('unfollow');

Route::post('paymentregister',[RegisterController::class,'paymentregister'])->name('paymentregister');
Route::get('member/register',[RegisterController::class,'showRegisterForm'])->name('member.register');
Route::post('member/register',[RegisterController::class,'register'])->name('member.register.store');

// photographer 
Route::get('photographers',[PhotographerController::class,'index']);




