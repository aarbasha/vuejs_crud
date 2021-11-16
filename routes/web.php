<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', function () {
    return view('category');
})->name('category');

//###################################### VUE JS CRUD ############################################
//save category
Route::post('save-category',[CategoryController::class , 'store'])->name('save-category');
// all category
Route::get('all_category',[CategoryController::class , 'index'])->name('all_category');
//Edit Cat edit_category
Route::get('edit_category/{id}',[CategoryController::class , 'edit'])->name('edit_category');
//update update_category
Route::put('update_category',[CategoryController::class , 'update'])->name('update_category');
// delete delete_category
Route::delete('delete_category/{id}',[CategoryController::class , 'destroy'])->name('delete_category');
//###################################### VUE JS CRUD ############################################
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
