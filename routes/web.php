<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->group(function () {  

    Route::resource('categories','App\Http\Controllers\Admin\CategoryController');
    Route::get('category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateStatus'])->name('categories.status');

    Route::resource('contracts','App\Http\Controllers\Admin\ContractController')->except('edit');
    Route::get('contract/{id}', [App\Http\Controllers\Admin\ContractController::class, 'updateStatus'])->name('contracts.status');
    Route::get('contracts/edit/{id?}', [App\Http\Controllers\Admin\ContractController::class, 'edit'])->name('contracts.edit');

    Route::resource('sections','App\Http\Controllers\Admin\SectionController')->except('create','edit');
    Route::get('sections/create/{id}', [App\Http\Controllers\Admin\SectionController::class, 'create'])->name('sections.create');
   Route::get('sections/edit/{id}', [App\Http\Controllers\Admin\SectionController::class, 'edit'])->name('sections.edit');
});
