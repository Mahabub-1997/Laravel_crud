<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
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
//
//Route::get('/', function () {
//    return view('welcome');
//});
 Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/create',[PostController::class,'create'])->name('create');
Route::post('/store',[PostController::class,'storeData'])->name('store');
Route::get('/edit/{id}',[PostController::class,'editData'])->name('edit');
Route::post('/update/{id}',[PostController::class,'updateData'])->name('update');
Route::get('/delete/{id}',[PostController::class,'deleteData'])->name('delete');

Route::get('/imageUpload/{id}',[PostImageController::class,'index'])->name('imageUpload');
