<?php

use Illuminate\Support\Facades\Auth;
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

//Auth::routes();
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard',function(){
        return view('layouts.admin');
    });
    Route::get('/category',[\App\Http\Controllers\admin\CategoryController::class,'index']);
    Route::get('/add-category',[\App\Http\Controllers\admin\CategoryController::class,'add']);
    Route::post('insert-category',[\App\Http\Controllers\admin\CategoryController::class,'insert']);
    Route::get('edit-cat/{id}',[\App\Http\Controllers\admin\CategoryController::class,'edit']);
});
