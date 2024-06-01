<?php

use Illuminate\Support\Facades\Route;

//declare controllers
use App\Http\Controllers\HomeController;

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
