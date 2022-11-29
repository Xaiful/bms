<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->middleware(['auth'])->group( function (){
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::get('/status/{id}',[PostController::class,'status'])->name('status');
    // Route::resource('post',PostController::class);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // Route::get('/create_user',[UsercreateController::class,'create'])->name('user.create');
    // Route::post('/create_user',[UsercreateController::class,'store'])->name('user.store');
});
require __DIR__.'/auth.php';
