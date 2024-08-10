<?php

use Illuminate\Support\Facades\Route;

//declare controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BorrowBookController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\LoginController;


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

Route::get('/', function() {
    return redirect()->route('home');
});

Route::get('/admin', array(HomeController::class, 'index'))->name('home');

Route::get('/admin/admin-register', [LoginController::class, 'register']);
Route::post('/admin/admin-register-submit', [LoginController::class, 'registerSubmit']);

Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/submit-login', [LoginController::class, 'submitLogin']);
Route::get('/admin/logout', [LoginController::class, 'submitLogout'])->name('logout');

Route::get('/admin/test-hash', [LoginController::class, 'testHash']);

Route::get('/admin/home/dashboard', array(HomeController::class, 'dashboard'));

Route::get('/admin/book-categories', array(BookController::class, 'bookCategories'));
Route::get('/admin/book-categories/add', array(BookController::class, 'bookCategoriesAdd'));
Route::post('/admin/book-categories/add/submit', array(BookController::class, 'bookEntryAddSubmit'));
Route::post('/admin/book-categories/edit/submit', array(BookController::class, 'bookCategoriesSubmitEdit'));
Route::get('/admin/book-categories/edit', array(BookController::class, ''));

Route::get('/admin/book-entry', array(BookController::class, 'bookEntry'));
Route::post('/admin/book-entry/submit-add', array(BookController::class, 'bookEtnrySubmitAdd'));
Route::get('/admin/book-entry/add', array(BookController::class, 'bookEntryAdd'));
Route::post('/admin/books/get-book-information', [BookController::class, 'getBookInformation']);

//borrowers
Route::get('/admin/settings/borrowers-list', array(BorrowerController::class, 'index'));
Route::post('/admin/settings/borrowers-list/submit-data', array(BorrowerController::class, 'submitBorrowersData'));


//borrow book
Route::get('/admin/transaction/borrow-book', array(BorrowBookController::class, 'index'));
Route::post('/admin/transaction/borrow-book/get-borrowers', array(BorrowBookController::class, 'getBorrowersList'));

//return book
Route::get('/admin/transaction/return-book', array(ReturnBookController::class, 'index'));

//transaction information
Route::get('/admin/transaction/transaction-info', array(BorrowBookController::class, 'transactionInformation'));