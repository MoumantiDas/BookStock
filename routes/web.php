<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\emp1Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\dropdownController;
use App\Http\Controllers\orderbookController;
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
Route::resource('books', BooksController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('upload', [emp1Controller::class, 'fileImportExport'])->name('fileImportExport');;
Route::post('uploadpost', [emp1Controller::class, 'fileImportPost'])->name('fileImportPost');
Route::get('export', [emp1Controller::class, 'export'])->name('export');
Route::get('datepicker', [emp1Controller::class, 'datepickercreate'])->name('datepickercreate');
Route::post('datepicker', [emp1Controller::class, 'datepickerdone'])->name('datepickerdone');
Route::get('datepicker', [emp1Controller::class, 'courtdisplay'])->name('courtdisplay');
Route::get('datepicker/getlawyer/{id}','DataController@getlawyer');
Route::get('cat', [CategoryController::class, 'index'])->name('index');;
Route::post('subcat', [CategoryController::class, 'subCat'])->name('subcat');;
Route::get('prodview',[ProductController::class,'prodfunct'])->name('prodfunct');
Route::get('findProductName',[ProductController::class,'findProductName'])->name('findProductName');
Route::get('findPrice',[ProductController::class,'findPrice'])->name('findPrice');
Route::get('dropdownlist',[DropdownController::class,'index'])->name('dropdownlist');
Route::get('get-state-list',[DropdownController::class,'getStateList'])->name('get-state-list');
Route::get('get-city-list',[DropdownController::class,'getCityList'])->name('get-city-list');
Route::get('orderbook',[orderbookController::class,'orderbook'])->name('orderbook');
Route::post('orderbook',[orderbookController::class,'orderbookpost'])->name('orderbookpost');
Route::get('get-bookqty-list',[orderbookController::class,'getbookqtyt'])->name('getbookqtyt');
Route::get('cancelbook',[orderbookController::class,'cancelbook'])->name('cancelbook');
Route::post('cancelbook',[orderbookController::class,'cancelbookpost'])->name('cancelbookpost');
Route::get('get-bookcancel-list',[orderbookController::class,'getbookcancelqty'])->name('getbookcancelqty');
