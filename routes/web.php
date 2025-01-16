<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\StallionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\MareController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Member\Auth\RegisterController;
use App\Http\Controllers\Frontend\PhotographerController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\Aboutcontroller;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProgenyController;
use App\Http\Controllers\comingsoonController;
use App\Http\Controllers\subscriptionController;
use App\Http\Controllers\SemencontractController;
use App\Http\Controllers\Frontend\serviceController;
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
Route::get('stallions-follow', [FollowController::class, 'follow']);
// unfollow user route
Route::get('stallions-unfollow', [FollowController::class, 'unfollow']);

Route::post('member-paymentregister',[RegisterController::class,'paymentregister'])->name('member-paymentregister');
Route::get('member/register',[RegisterController::class,'showRegisterForm'])->name('member.register');
Route::post('member/register',[RegisterController::class,'register'])->name('member.register.store');

// photographer 
Route::get('photographers',[PhotographerController::class,'index']);
// service 
Route::get('services',[serviceController::class,'service']);
Route::get('single-service/{id}',[serviceController::class,'singleService']);
//Event

Route::get('events',[EventController::class,'event']);

Route::get('event/{day}',[EventController::class,'eventDay']);

Route::get('event-poup',[EventController::class,'eventPoup']);

Route::post('event/seach',[EventController::class,'searchEvent'])->name('event.search');

Route::POST('event/seachpagination',[EventController::class,'searchEventp']);

Route::get('follow',[EventController::class,'follow']);
Route::get('unfollow',[EventController::class,'unfollow']);
// About
Route::get('about-us',[Aboutcontroller::class,'about']);
// contact us 
Route::get('contact-us',[ContactController::class,'contactUs']);
// Progeny
Route::get('progeny',[ProgenyController::class,'progeny']);
//semen contract
Route::post('semen-contract',[SemencontractController::class,'semenContract'])->name('semen-contract');




