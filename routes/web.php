<?php

use Illuminate\Support\FaCades\Route;
use App\Http\Controllers\CompanyController as CC;
use App\Http\Controllers\EmployeeController as EC;

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

Route::get('/companies', [CC::class, 'index'])->name('cc_index');
Route::get('/companies/create', [CC::class, 'create'])->name('cc_create');
Route::post('/companies/store', [CC::class, 'store'])->name('cc_store');
Route::get('/companies/edit/{companyId}', [CC::class, 'edit'])->name('cc_edit');
Route::put('/companies/{company}', [CC::class, 'update'])->name('cc_update');
Route::delete('/companies/{company}', [CC::class, 'destroy'])->name('cc_delete');
Route::get('/companies/show/{id}', [CC::class, 'show'])->name('cc_show');

Route::get('/employees', [EC::class, 'index'])->name('ec_index');
Route::get('/employees/create', [EC::class, 'create'])->name('ec_create');
Route::post('/employees/store', [EC::class, 'store'])->name('ec_store');
Route::get('/employees/edit/{employee}', [EC::class, 'edit'])->name('ec_edit');
Route::put('/employees/{employee}', [EC::class, 'update'])->name('ec_update');
Route::delete('/employees/{employee}', [EC::class, 'destroy'])->name('ec_delete');
Route::get('/employees/show/{id}', [EC::class, 'show'])->name('ec_show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
