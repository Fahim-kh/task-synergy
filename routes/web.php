<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('/',function(){
    return view('welcome');
})->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']],function () {
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('/user',App\Http\Controllers\Admin\UserController::class);
    Route::post('/user_delete', [App\Http\Controllers\Admin\UserController::class,'user_delete'])->name('user_delete');
    Route::post('/user_status', [App\Http\Controllers\Admin\UserController::class,'user_status'])->name('user_status');
    Route::get('/module',[App\Http\Controllers\Admin\ModuleController::class,'index'])->name('module.index');
    Route::post('/module_store',[App\Http\Controllers\Admin\ModuleController::class,'store'])->name('module.store');
    Route::resource('/role', App\Http\Controllers\Admin\RoleController::class);
    Route::post('/role_filter', [App\Http\Controllers\Admin\RoleController::class,'filter'])->name('rolefilter');
    Route::post('/role_delete', [App\Http\Controllers\Admin\RoleController::class,'role_delete'])->name('role_delete');
    Route::resource('/general_settings', App\Http\Controllers\Admin\GeneralSettingController::class);
    Route::resource('/slider',App\Http\Controllers\Admin\SliderController::class);
    Route::put('/slider/{status}/status',[App\Http\Controllers\Admin\SliderController::class,'status'])->name('slider.satatus');
    Route::resource('/testimonial',App\Http\Controllers\Admin\TestimonialController::class);
    Route::put('/testimonial/{status}/status',[App\Http\Controllers\Admin\TestimonialController::class,'status'])->name('testimonial.status');
    Route::resource('/team',App\Http\Controllers\Admin\TeamController::class);
    Route::put('/team/{status}/status',[App\Http\Controllers\Admin\TeamController::class,'status'])->name('team.status');
    Route::resource('/services',App\Http\Controllers\Admin\ServicesController::class);
    Route::put('/services/{status}/status',[App\Http\Controllers\Admin\ServicesController::class,'status'])->name('services.status');
    Route::resource('/subservices',App\Http\Controllers\Admin\SubServicesController::class);
    Route::put('/sub_service/{status}/status',[App\Http\Controllers\Admin\SubServicesController::class,'status'])->name('sub_services.status');

    Route::post('/services/deleteAll',[App\Http\Controllers\Admin\ServicesController::class,'deleteAll'])->name('deleteAll');
    Route::resource('/location',App\Http\Controllers\Admin\LocationController::class);
    Route::put('/location/{status}/status',[App\Http\Controllers\Admin\LocationController::class,'status'])->name('location.status');
    Route::resource('/branch',App\Http\Controllers\Admin\BranchesController::class);
    Route::put('/branch/{status}/status',[App\Http\Controllers\Admin\BranchesController::class,'status'])->name('branch.status');
    Route::resource('/page',App\Http\Controllers\Admin\PagesController::class);
    Route::resource('/blog',App\Http\Controllers\Admin\BlogController::class);
    Route::resource('/faq',App\Http\Controllers\Admin\FaqsController::class);
    Route::put('/faq/{status}/status',[App\Http\Controllers\Admin\FaqsController::class,'status'])->name('faq.status');


});

require __DIR__.'/auth.php';
