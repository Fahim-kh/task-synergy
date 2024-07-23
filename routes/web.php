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
    return view('auth.login');
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
    Route::resource('/department',App\Http\Controllers\Admin\DepartmentController::class);

    Route::resource('/location',App\Http\Controllers\Admin\LocationController::class);
    Route::put('/location/{status}/status',[App\Http\Controllers\Admin\LocationController::class,'status'])->name('location.status');
    Route::resource('/blog',App\Http\Controllers\Admin\BlogController::class);
   

});

require __DIR__.'/auth.php';
