<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController as CC;
use App\Http\Controllers\EmployeeController as EC;
use App\Http\Controllers\FrontController as FC;
use App\Http\Resources\CompanyResource as CR;
use App\Http\Resources\EmployeeResource as ER;



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


// Route::resource('/', CC::class. ['names'=>[
//         'index' => 'cc_index',
//         'create' => 'cc_create',
//         'store' => 'cc_store',
//         'update' => 'cc_update',
//     ]]) ->middleware('role:admin'); 
    
// Route::resource('/show', CC::class, ['names'=>[
//         'show'=> 'cc_show']])->middleware('role:user');
// Route::resource('/edit', CC::class, ['names'=>[
//         'edit'=> 'cc_edit',]])->middleware('role:user');


Route::get('/', [CC::class, 'index'])->name('cc_index')->middleware('role:user');
Route::get('/create', [CC::class, 'create'])->name('cc_create')->middleware('role:admin');
Route::post('/store', [CC::class, 'store'])->name('cc_store')->middleware('role:admin');
Route::get('/edit/{companyId}', [CC::class, 'edit'])->name('cc_edit')->middleware('role:admin');
Route::put('/{company}', [CC::class, 'update'])->name('cc_update')->middleware('role:admin');
Route::delete('/{company}', [CC::class, 'destroy'])->name('cc_delete')->middleware('role:admin');
Route::get('/show/{id}', [CC::class, 'show'])->name('cc_show')->middleware('role:user');

});

Route::prefix('employees')->group(function () {

// Route::resource('/', EC::class. ['names'=>[
//         'index' => 'ec_index',
//         'create' => 'ec_create',
//         'store' => 'ec_store',
//         'update' => 'ec_update',
//     ]]) ->middleware('role:admin'); 
    
// Route::resource('/show', CC::class, ['names'=>[
//         'show'=> 'ec_show']])->middleware('role:user');
// Route::resource('/edit', CC::class, ['names'=>[
//         'edit'=> 'ec_edit',]])->middleware('role:user');

Route::get('/', [EC::class, 'index'])->name('ec_index')->middleware('role:admin');
Route::get('/create', [EC::class, 'create'])->name('ec_create')->middleware('role:user');
Route::post('/store', [EC::class, 'store'])->name('ec_store')->middleware('role:admin');
Route::get('/edit/{employee}', [EC::class, 'edit'])->name('ec_edit')->middleware('role:user');
Route::put('/{employee}', [EC::class, 'update'])->name('ec_update')->middleware('role:user');
Route::delete('/{employee}', [EC::class, 'destroy'])->name('ec_delete')->middleware('role:admin');
Route::get('/show/{id}', [EC::class, 'show'])->name('ec_show')->middleware('role:user');

});

Route::get('/', [EC::class, 'sendMail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
