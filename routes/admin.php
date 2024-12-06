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
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Owner\Auth;
use App\Http\Controllers\Admin\GettouchController;
use App\Http\Controllers\Admin\ProgenyController; 
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
//login 
Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('admin/login',[LoginController::class,'login'])->name('admin.login.store');

// middlware 
Route::group(['middleware' => ['auth']], function() {

    // permission
    Route::resource('permissions',App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class,'destroy']);
    
    // role
    Route::resource('roles',App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy']);
    Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'givePermissionToRole']);
    
    // user
    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete',[App\Http\Controllers\UserController::class, 'destroy']);

    Route::prefix('admin')->name('admin.')->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class,'dashboard']);
        // category
        Route::prefix('category')->name('category.')->group(function(){
        Route::get('/',[CategoryController::class,'index']);
        Route::get('create',[CategoryController::class,'create']);
        Route::post('store',[CategoryController::class,'store'])->name('store');
        Route::get('edit/{id}',[CategoryController::class,'edit']);
        Route::post('update',[CategoryController::class,'update'])->name('update');
        });

        // photographer 
        Route::prefix('photographer')->name('photographer.')->group(function(){
            Route::get('/',[PhotographerController::class,'index']);  
            Route::post('store',[PhotographerController::class,'store'])->name('store');
            Route::get('edit/{id}',[PhotographerController::class,'edit'])->name('edit');
            Route::post('update',[PhotographerController::class,'update'])->name('update');
        });
        
        // stallion list
        Route::get('stallions',[StallionController::class,'index']);
        
        // mare list
        Route::get('mares',[MareController::class,'index']);

        Route::get('home',[HomeController::class,'index']);

        // approve stallion & mare 
        Route::post('approve/{id}',[StallionController::class,'approve']);

        // decline stallion & mare
        Route::post('decline/{id}',[StallionController::class,'decline'])->name('decline');

        Route::post('active/{id}',[StallionController::class,'active'])->name('active');
        Route::post('inactive/{id}',[StallionController::class,'inactive'])->name('inactive');

        // home page content performance progeny route
        Route::get('performance-progeny',[HomeController::class,'progenyPerformance']);
      
        Route::post('progeny-performance/store',[HomeController::class,'progenyPerformanceStore'])->name('performance-progeny.store');

        // home page content topside route
        Route::get('topside',[HomeController::class,'topSide']);

        Route::post('topside',[HomeController::class,'topSideStore'])->name('topside.store');

        // stallion list page details route
        Route::get('stallion/details',[StallionController::class,'stallionDetails']);
        Route::post('stallion-details',[StallionController::class,'stallionDetailsStore'])->name('stallion-details.store');
       
        // mare list page details route
        Route::get('mare/details',[MareController::class,'mareDetails']);
        Route::post('mare-details',[MareController::class,'mareDetailsStore'])->name('mare-details.store');
        
        // plan 
        Route::get('plan',[PlanController::class,'index'])->name('plans.index');
        Route::get('plan/create',[PlanController::class,'create']);
        Route::post('plan',[PlanController::class,'store'])->name('plan.store');
        Route::get('plan/edit/{id}',[PlanController::class,'edit']);
        Route::post('plan/update/{id}',[PlanController::class,'update'])->name('plan.update');
        Route::get('plan/delete/{id}',[PlanController::class,'delete']);
    });
});

// Get touch form fill route
Route::get('gettouch',[GettouchController::class,'gettouch']);
Route::post('gettouch-store',[GettouchController::class,'store'])->name('gettouch-store');
// progeny form fill route
Route::post('progeny',[ProgenyController::class,'store'])->name('progeny-form');

