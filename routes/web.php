<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\StallionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\MareController;
use App\Http\Controllers\Frontend\FollowController;

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

Route::get('/', function () {
    return view('welcome');
});

  // Auth::routes();


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('stallions',[StallionController::class,'stallion']);
Route::get('single-stallion/{id}',[StallionController::class,'signleStallion']);
Route::get('stallionlist',[StallionController::class,'stallionlist'])->name('stallionlist');
Route::get('mares',[MareController::class,'mare']);
Route::get('single-mare/{id}',[MareController::class,'signleMare']);

Route::post('follow/{stallionId}', [FollowController::class, 'follow'])->name('follow');
Route::post('unfollow/{stallionId}', [FollowController::class, 'unfollow'])->name('unfollow');





