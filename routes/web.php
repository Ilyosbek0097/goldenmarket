<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AdminPayListController;
use App\Http\Controllers\CashSaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\OutputTypeController;
use App\Http\Controllers\PayListController;
use App\Http\Controllers\ProductNameController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TotalSaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

    return view('auth.login');
});
//User Dashboard
Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function (){
    Route::get('/user_dashboard', function (){
        return view('user.user_home');
    })->middleware(['auth', 'user'])->name('user.user_dashboard');

    Route::resource('warehouses', WarehouseController::class);
    Route::resource('cashsales', CashSaleController::class);
    Route::resource('totalsales', TotalSaleController::class);
    Route::resource('paylists', PayListController::class);
    Route::resource('clients', ClientController::class);
    Route::controller(ReportsController::class) ->group(function(){
        Route::get('/index', 'index')->name('reports.index');
        Route::get('/add_product_report', 'add_product_report')->name('reports.add_product_report');
    });

});
// Admin Route
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function (){
    //Admin Dashboard
    Route::get('/admin_dashboard', function (){
        return view('admin.admin_dashboard');
    })->middleware(['auth', 'admin'])->name('admin.admin_dashboard');

    Route::resource('branchs', BranchController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);

    Route::resource('types', TypeController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('productnames', ProductNameController::class);
    Route::resource('addproducts', AddProductController::class);
    Route::resource('marks', MarkController::class);
    Route::resource('currencys', CurrencyController::class);
    Route::resource('users', UserController::class);
    Route::resource('outputtypes', OutputTypeController::class);
    Route::resource('adminpaylists', AdminPayListController::class);
    Route::post('/outputstore', [AdminPayListController::class, 'outputstore'])->name('adminpaylists.outputstore');



});
//Super User
Route::group(['middleware' => ['auth', 'superuser'], 'prefix' => 'superuser'], function (){
    //Super User Dashboard
    Route::get('/superuser_dashboard', function (){
        return view('superuser.superuser_dashboard');
    })->middleware(['auth', 'superuser'])->name('superuser.superuser_dashboard');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
