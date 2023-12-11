<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DailyServiceController;
use App\Http\Controllers\InvoiceController;
if (env('APP_ENV') === 'production') {
//    URL::forceSchema('https');
}


Route::get('/', function () {
    return view('auth.login');
});


Route::resource('clients',ClientController::class);
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');

Route::resource('services',ServiceController::class);
//Route::resource('employees',EmployeeController::class);

// Employee Section
Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('/employees/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::post('/employees/update', [EmployeeController::class, 'update'])->name('employees.update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Module Section
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user', [UserController::class, 'manage'])->name('user.index');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/user/changepassword/{id}', [UserController::class, 'changepassword'])->name('user.changepassword');
    Route::post('/user/setpassword/{id}', [UserController::class, 'setpassword'])->name('user.setpassword');

    // User Module Section
    Route::get('/location/index', [LocationController::class, 'index'])->name('location.index');
    Route::get('/location/add', [LocationController::class, 'add'])->name('location.add');
    Route::post('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('/location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::get('/location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');
    Route::resource('equipments',\App\Http\Controllers\EquipmentController::class);

    //ds Module section

    Route::get('/ds/index', [DailyServiceController::class, 'index'])->name('ds.index');
    Route::post('/ds/filter', [DailyServiceController::class, 'filter'])->name('ds.filter');
    Route::get('/ds/show/{id}', [DailyServiceController::class, 'show'])->name('ds.show');
    Route::get('/ds/destroy/{id}', [DailyServiceController::class, 'destroy'])->name('ds.destroy');
//    Route::get('/location/add', [LocationController::class, 'add'])->name('location.add');
//    Route::post('/location/create', [LocationController::class, 'create'])->name('location.create');
//    Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
//    Route::post('/location/update/{id}', [LocationController::class, 'update'])->name('location.update');
//    Route::get('/location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/show/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/download/{id}', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');

});
