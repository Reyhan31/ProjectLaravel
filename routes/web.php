<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/login/github', [LoginController::class, 'github'])->middleware('guest');
Route::get('/login/github/redirect', [LoginController::class, 'githubRedirect'])->middleware('guest');

Route::get('/login/google', [LoginController::class, 'google'])->middleware('guest');
Route::get('/login/google/redirect', [LoginController::class, 'googleRedirect'])->middleware('guest');

Route::get('/regis', [RegisController::class, 'index'])->middleware('guest');
Route::post('/regis', [RegisController::class, 'store']);

Route::get('/menu/{id}', [MenuController::class, 'index']);

Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cartDelete', [CartController::class, 'delete'])->middleware('auth');

Route::post('/invoice', [InvoiceController::class, 'store'])->middleware('verified');
Route::get('/invoice', [InvoiceController::class, 'index'])->middleware('verified');
Route::post('/invoiceDetail', [InvoiceController::class, 'detail'])->middleware('verified');

Route::get('/userData', [AdminController::class, 'index'])->middleware('verified');
Route::post('/userDelete', [AdminController::class, 'delete'])->middleware('verified');
Route::post('/userUpdate', [AdminController::class, 'update'])->middleware('verified');

Route::get('/addProduct', [ProductController::class, 'index'])->middleware('verified');
Route::post('/addProduct', [ProductController::class, 'store'])->middleware('verified');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('verified');
Route::post('/changeProfile', [ProfileController::class, 'change'])->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
