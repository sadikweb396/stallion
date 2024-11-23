<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhotographerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StallionController;
use App\Http\Controllers\Admin\MareController;
use App\Http\Controllers\Owner\Auth;

  
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
Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('admin/login',[LoginController::class,'login'])->name('admin.login.store');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('permissions',App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class,'destroy']);
    
    Route::resource('roles',App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy']);
    Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete',[App\Http\Controllers\UserController::class, 'destroy']);

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class,'dashboard']);
        Route::prefix('category')->name('category.')->group(function(){
        Route::get('/',[CategoryController::class,'index']);
        Route::get('create',[CategoryController::class,'create']);
        Route::post('store',[CategoryController::class,'store'])->name('store');
        Route::get('edit/{id}',[CategoryController::class,'edit']);
        Route::post('update',[CategoryController::class,'update'])->name('update');
        });

        Route::prefix('photographer')->name('photographer.')->group(function(){
            Route::get('/',[PhotographerController::class,'index']);
            Route::get('create',[PhotographerController::class,'create']);
            Route::post('store',[PhotographerController::class,'store'])->name('store');
        });
        
        Route::get('stallions',[StallionController::class,'index']);

        Route::get('mares',[MareController::class,'index']);

        Route::get('home',[HomeController::class,'index']);

        Route::post('approve/{id}',[StallionController::class,'approve'])->name('approve');
        Route::post('decline/{id}',[StallionController::class,'decline'])->name('decline');

        Route::post('active/{id}',[StallionController::class,'active'])->name('active');
        Route::post('inactive/{id}',[StallionController::class,'inactive'])->name('inactive');

        Route::get('performance-progeny',[HomeController::class,'progenyPerformance']);
      
        Route::post('progeny-performance/store',[HomeController::class,'progenyPerformanceStore'])->name('performance-progeny.store');

        Route::get('topside',[HomeController::class,'topSide']);

        Route::post('topside',[HomeController::class,'topSideStore'])->name('topside.store');

        Route::get('stallion/details',[StallionController::class,'stallionDetails']);
        Route::post('stallion-details',[StallionController::class,'stallionDetailsStore'])->name('stallion-details.store');
        Route::get('mare/details',[MareController::class,'mareDetails']);
        Route::post('mare-details',[MareController::class,'mareDetailsStore'])->name('mare-details.store');
       
    });
});

