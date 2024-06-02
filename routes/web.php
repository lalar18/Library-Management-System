<?php

use Illuminate\Support\Facades\Route;

//declare controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     redirect('/home');
// });

Route::get('/', array(HomeController::class, 'index'));

Route::get('/admin/home/dashboard', array(HomeController::class, 'dashboard'));

Route::get('/admin/book-categories', array(BookController::class, 'bookCategories'));
Route::get('/admin/book-categories/add', array(BookController::class, 'bookCategoriesAdd'));
Route::get('/admin/book-categories/edit', array(BookController::class, ''));

Route::get('/admin/book-entry', array(BookController::class, 'bookEntry'));

