<?php

use Illuminate\Support\FaCades\Route;
use App\Http\Controllers\CompanyController as CC;
use App\Http\Controllers\EmployeeController as EC;
use App\Http\Controllers\FrontController as FC;
use App\Http\Controllers\MailController as MC;
use App\Http\Resources\CompanyResource as CR;
use App\Http\Resources\CompanyCollection;
use App\Models\Company;

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

Route::get('/', [FC::class, 'index'])->name('fc_index');

Route::prefix('companies')->group(function () {

Route::get('/', [CC::class, 'index'])->name('cc_index')->middleware('role:user');
Route::get('/create', [CC::class, 'create'])->name('cc_create')->middleware('role:admin');
Route::post('/store', [CC::class, 'store'])->name('cc_store')->middleware('role:admin');
Route::get('/edit/{companyId}', [CC::class, 'edit'])->name('cc_edit')->middleware('role:admin');
Route::put('/{company}', [CC::class, 'update'])->name('cc_update')->middleware('role:admin');
Route::delete('/{company}', [CC::class, 'destroy'])->name('cc_delete')->middleware('role:admin');
Route::get('/show/{id}', [CC::class, 'show'])->name('cc_show')->middleware('role:user');

});

Route::prefix('employees')->group(function () {

Route::get('/', [EC::class, 'index'])->name('ec_index')->middleware('role:admin');
Route::get('/create', [EC::class, 'create'])->name('ec_create')->middleware('role:user');
Route::post('/store', [EC::class, 'store'])->name('ec_store')->middleware('role:admin');
Route::get('/edit/{employee}', [EC::class, 'edit'])->name('ec_edit')->middleware('role:user');
Route::put('/{employee}', [EC::class, 'update'])->name('ec_update')->middleware('role:user');
Route::delete('/{employee}', [EC::class, 'destroy'])->name('ec_delete')->middleware('role:admin');
Route::get('/show/{id}', [EC::class, 'show'])->name('ec_show')->middleware('role:user');

});


Route::get('/company/{id}', function ($id) {
    return new CR(Company::findOrFail($id));
});

// Route::get('/companies', function () {
//     return CR::collection(Company::all()->keyBy->id);
// });

Route::get('/companies', function () {
    return new CompanyCollection(Company::all()->keyBy->id);
});

// Route::get('/', [MC::class, 'sendMail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
