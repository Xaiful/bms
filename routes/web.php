<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\CowController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PopularController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\CompanyIntroController;

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
    return view('auth.login');
});

Route::prefix('admin')->middleware(['auth'])->group( function (){
    Route::resource('medicines', MedicineController::class);
    Route::get('/medicines/stock',[MedicineController::class,'showStock'])->name('medicines.stock');
    Route::get('/medicines/{medicine}/stock', [MedicineController::class, 'showStock'])->name('medicines.stock');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('cows',CowController::class);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});
require __DIR__.'/auth.php';
