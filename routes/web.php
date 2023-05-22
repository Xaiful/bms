<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CowController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CowMedicineController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\FeedCalculationController;

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
    Route::get('/medicines/{medicine}/stock', [MedicineController::class, 'showStock'])->name('medicines.stock');
    Route::put('/medicines/{medicine}/stock', [MedicineController::class, 'updatestock'])->name('medicines.update');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/subcategories', SubcategoryController::class);
    Route::resource('/cows',CowController::class);
    Route::get('/cow-medicines', [CowMedicineController::class, 'index'])->name('cow-medicines.index');
    Route::post('/cow-medicines', [CowMedicineController::class, 'store'])->name('cow-medicines.store');
    Route::get('/cow-medicines/create', [CowMedicineController::class, 'create'])->name('cow-medicines.create');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});
require __DIR__.'/auth.php';