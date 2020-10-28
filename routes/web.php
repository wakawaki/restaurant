<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('orders',App\Http\Controllers\OrdersController::class);
Route::resource('stores',App\Http\Controllers\StoresController::class);
Route::resource('tables',App\Http\Controllers\TablesController::class); 
Route::resource('articles',App\Http\Controllers\ArticlesController::class); 
Route::resource('articlecategories',App\Http\Controllers\ArticleCategoryController::class);
Route::get('/tableslist', [App\Http\Controllers\TablesController::class, 'list'])->name('list');
Route::get('/orderstable/{table_id}', [App\Http\Controllers\OrdersController::class, 'table'])->name('table');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
