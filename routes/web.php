<?php

use Illuminate\Support\Facades\Route;

//declare controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BorrowBookController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenaltyController;


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
Route::any('/admin/transaction/borrow-book', array(BorrowBookController::class, 'index'));
Route::post('/admin/transaction/borrower-book/getBook', array(BorrowBookController::class, '    '));
Route::post('/admin/transaction/borrower-book/add-to-cart-books', array(BorrowBookController::class, 'addToCartSelectedBooks'));
Route::any('/admin/transaction/get-transaction-info', [BorrowBookController::class, 'getTransaction']);

Route::post('/admin/transaction/borrow-book/get-borrowers', array(BorrowBookController::class, 'getBorrowersList'));

//return book
Route::get('/admin/transaction/return-book', array(ReturnBookController::class, 'index'));

//transaction information
Route::get('/admin/transaction/transaction-info', array(BorrowBookController::class, 'transactionInformation'));

Route::get('/admin/manage-users', array(UserController::class, 'index'));
Route::get('/admin/manage-users/edit/{id}', [UserController::class, 'edit']);
Route::put('admin/manage-users/editSubmit', [UserController::class, 'update']);

// Display the add user form
Route::get('admin/manage-users/add', [UserController::class, 'showAddUserForm']);

Route::post('admin/manage-users/add', [UserController::class, 'add']);

Route::get('/admin/manage-users', [UserController::class, 'index']);

Route::any('/admin/manage-penalty', [PenaltyController::class, 'index'])->name('penalty.index');

Route::any('/admin/manage-penalty/create', [PenaltyController::class, 'create'])->name('penalty.create');

Route::post('/admin/manage-penalty/update', [PenaltyController::class, 'update']);

Route::post('/admin/manage-penalty/add', [PenaltyController::class, 'add'])->name('penalty.add');
