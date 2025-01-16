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
use App\Http\Controllers\Admin\HomebannerController;
use App\Http\Controllers\Admin\AdvertisementsController;
use App\Http\Controllers\Admin\EventController; 
use App\Http\Controllers\Admin\LogoController; 
use App\Http\Controllers\Admin\OurteamController; 
use App\Http\Controllers\Admin\AboutusController; 
use App\Http\Controllers\Admin\ContactusController; 
use App\Http\Controllers\Owner\FollowController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\Admin\ProfileController;
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
    Route::get('/edit-profile/{id}',[ProfileController::class,'editProfile']);
    Route::get('/user/profile',[ProfileController::class,'profile'])->name('profile');
    Route::prefix('admin')->name('admin.')->group(function (){
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

         // photographer 
         Route::prefix('badge')->name('badge.')->group(function(){
            Route::get('/',[BadgeController::class,'index']);  
            Route::get('create',[BadgeController::class,'create']);  
            Route::post('store',[BadgeController::class,'store'])->name('store');
            Route::get('edit/{id}',[BadgeController::class,'edit'])->name('edit');
            Route::post('update',[BadgeController::class,'update'])->name('update');
            Route::get('delete/{id}',[BadgeController::class,'delete']);  
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
        Route::get('home/mare-section',[HomeController::class,'mareSection']);
      
        Route::post('mare-section/store',[HomeController::class,'mareSectionStore'])->name('mare-section.store');

        // home page content topside route
        Route::get('home/stallion-section',[HomeController::class,'stallionSection']);

        Route::post('stallion-section/store',[HomeController::class,'stallionSectionStore'])->name('stallion-section.store');

        // stallion list page details route
        Route::get('stallion/list',[StallionController::class,'stallionList']);
        Route::post('stallion-list',[StallionController::class,'stallionListStore'])->name('stallion-list.store');
       
        // mare list page details route
        Route::get('mare/list',[MareController::class,'mareList']);
        Route::post('mare-list',[MareController::class,'mareListStore'])->name('mare-list.store');
        
        // plan 
        Route::get('plan',[PlanController::class,'index'])->name('plans.index');
        Route::get('plan/create',[PlanController::class,'create']);
        Route::post('plan',[PlanController::class,'store'])->name('plan.store');
        Route::get('plan/edit/{id}',[PlanController::class,'edit']);
        Route::post('plan/update/{id}',[PlanController::class,'update'])->name('plan.update');
        Route::get('plan/delete/{id}',[PlanController::class,'delete']);

        // home banner
        Route::get('home/banner',[HomebannerController::class,'index']);
        Route::post('home-banner',[HomebannerController::class,'store'])->name('home-banner');

        // advertisement
        Route::prefix('advertisement')->name('advertisement.')->group(function(){
        Route::get('/',[AdvertisementsController::class,'index']);
        Route::get('create',[AdvertisementsController::class,'create']);
        Route::post('store',[AdvertisementsController::class,'store'])->name('store');
        Route::get('edit/{id}',[AdvertisementsController::class,'edit']);
        Route::post('update',[AdvertisementsController::class,'update'])->name('update');
        Route::get('delete/{id}',[AdvertisementsController::class,'delete']);
        });

        // event 
        Route::prefix('event')->name('event.')->group(function(){
        Route::get('/',[EventController::class,'index']);
        Route::get('create',[EventController::class,'create']);
        Route::post('store',[EventController::class,'store'])->name('store');
        Route::get('edit/{id}',[EventController::class,'edit']);
        Route::post('update',[EventController::class,'update'])->name('update');
        Route::get('delete/{id}',[EventController::class,'delete']);
        //banner
        Route::get('banner',[EventController::class,'banner']);
        Route::post('banner-store',[EventController::class,'bannerStore'])->name('banner-store');
        });
        
        //event information
        Route::get('event-information',[EventController::class,'eventInformation']);
        Route::post('event-information-store',[EventController::class,'eventInformationStore'])->name('event-information-store');

        // logo
        Route::get('logo',[LogoController::class,'index']);
        Route::post('store',[LogoController::class,'store'])->name('logo.store');

        // Our Team
        Route::prefix('our-team')->name('our-team.')->group(function(){
        Route::get('/',[OurteamController::class,'index']);
        Route::get('create',[OurteamController::class,'create']);
        Route::post('store',[OurteamController::class,'store'])->name('store');
        Route::get('edit/{id}',[OurteamController::class,'edit']);
        Route::post('update',[OurteamController::class,'update'])->name('update');
        Route::get('delete/{id}',[OurteamController::class,'delete']);
        });

        Route::prefix('what-we-do')->name('what-we-do.')->group(function(){
            Route::get('/',[AboutusController::class,'whatweDo']);
            Route::post('store',[AboutusController::class,'whatwedoStore'])->name('store');
        });

        Route::prefix('our-brain-and-thinker')->name('our-brain-and-thinker.')->group(function(){
            Route::get('/',[AboutusController::class,'ourBrainrainThinker']);
            Route::get('create',[AboutusController::class,'create']);
            Route::post('store',[AboutusController::class,'ourbrainrainthinkerStore'])->name('store');
            Route::get('edit/{id}',[AboutusController::class,'edit']);
            Route::post('update',[AboutusController::class,'update'])->name('update');
            Route::get('delete/{id}',[AboutusController::class,'delete']);
        });
       
        Route::prefix('about-us')->name('about-us.')->group(function(){
            Route::get('banner',[AboutusController::class,'banner']);
            Route::post('banner-store',[AboutusController::class,'bannerStore'])->name('banner-store');
        });

        Route::prefix('contact-us')->name('contact-us.')->group(function(){
            Route::get('details',[ContactusController::class,'details']);
            Route::post('details-store',[ContactusController::class,'detailsStore'])->name('details-store');
            Route::get('banner',[ContactusController::class,'banner']);
            Route::post('banner-store',[ContactusController::class,'bannerStore'])->name('banner-store');
        });

        Route::prefix('progeny')->name('progeny.')->group(function(){
            Route::get('banner',[ProgenyController::class,'banner']);
            Route::post('banner-store',[ProgenyController::class,'bannerStore'])->name('banner-store');
        });

        Route::prefix('photographer')->name('photographer.')->group(function(){
            Route::get('banner',[PhotographerController::class,'banner']);
            Route::post('banner-store',[PhotographerController::class,'bannerStore'])->name('banner-store');
        });
      
        Route::get('progeny-information',[ProgenyController::class,'progenyInformation']);
        Route::post('progeny-information-store',[ProgenyController::class,'progenyinformationStore'])->name('progeny-information-store');

        Route::get('user-search',[App\Http\Controllers\UserController::class,'userSearch'])->name('user-search');

        Route::get('permission-search',[App\Http\Controllers\PermissionController::class,'permissionSearch'])->name('permission-search');

        Route::get('role-search',[App\Http\Controllers\RoleController::class,'roleSearch'])->name('role-search');
        
        Route::get('event-search',[EventController::class,'eventSearch'])->name('event-search');

        Route::get('plan-search',[StallionController::class,'planSearch'])->name('plan-search');

        Route::get('stallion-search',[StallionController::class,'stallionSearch'])->name('stallion-search');

        Route::get('mare-search',[MareController::class,'mareSearch'])->name('mare-search');

        Route::get('our-team-search',[OurteamController::class,'ourteamSearch'])->name('our-team-search');

        Route::get('our-brain-and-thinker-search',[AboutusController::class,'ourBrainerandThinkerSearch'])->name('our-brain-and-thinker-search');
      
       //progeny
       Route::get('progeny',[ProgenyController::class,'progeny']);

       Route::get('stallion/view/{id}',[StallionController::class,'stallionView']);

       Route::get('mare/view/{id}',[StallionController::class,'stallionView']);

       Route::get('popupdata',[StallionController::class,'popupdata']);

       Route::post('set-image',[StallionController::class,'setImage'])->name('set-image');
     
    });
    Route::post('update-profile',[ProfileController::class,'updateProfile'])->name('update-profile');
    Route::get('followed/event',[EventController::class,'followedEvent']);
    Route::get('subscription',[subscriptionController::class,'subscription']);
    Route::get('subscription/{id}',[subscriptionController::class,'singleSubscription']);
    Route::get('subscription-renew/{id}',[subscriptionController::class,'renewSubscription']);
});

// Get touch form fill route
Route::get('gettouch',[GettouchController::class,'gettouch']);
Route::post('gettouch-store',[GettouchController::class,'store'])->name('gettouch-store');
// progeny form fill route
Route::post('progeny',[ProgenyController::class,'store'])->name('progeny-form');

