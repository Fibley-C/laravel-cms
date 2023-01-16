<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DeliveriesController;

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

// Welcome
Route::get('/', [ConsoleController::class, 'dashboard'])->middleware('auth');

// Login routes
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');

// Dashboard routes
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

// Driver route
Route::get('/console/drivers/list', [DriversController::class, 'list'])->middleware('auth');
Route::get('/console/drivers/add', [DriversController::class, 'addForm'])->middleware('auth');
Route::post('/console/drivers/add', [DriversController::class, 'add'])->middleware('auth');
Route::get('/console/drivers/delete/{driver:id}', [DriversController::class, 'delete'])->where('driver', '[0-9]+')->middleware('auth');
Route::get('/console/drivers/edit/{driver:id}', [DriversController::class, 'editForm'])->where('driver', '[0-9]+')->middleware('auth');
Route::post('/console/drivers/edit/{driver:id}', [DriversController::class, 'edit'])->where('driver', '[0-9]+')->middleware('auth');

// Company route
Route::get('/console/companies/list', [CompaniesController::class, 'list'])->middleware('auth');
Route::get('/console/companies/add', [CompaniesController::class, 'addForm'])->middleware('auth');
Route::post('/console/companies/add', [CompaniesController::class, 'add'])->middleware('auth');
Route::get('/console/companies/delete/{company:id}', [CompaniesController::class, 'delete'])->where('company', '[0-9]+')->middleware('auth');
Route::get('/console/companies/edit/{company:id}', [CompaniesController::class, 'editForm'])->where('company', '[0-9]+')->middleware('auth');
Route::post('/console/companies/edit/{company:id}', [CompaniesController::class, 'edit'])->where('company', '[0-9]+')->middleware('auth');

// Delivery route
Route::get('/console/deliveries/list', [DeliveriesController::class, 'list'])->middleware('auth');
Route::get('/console/deliveries/add', [DeliveriesController::class, 'addForm'])->middleware('auth');
Route::post('/console/deliveries/add', [DeliveriesController::class, 'add'])->middleware('auth');
Route::get('/console/deliveries/delete/{delivery:id}', [DeliveriesController::class, 'delete'])->where('delivery', '[0-9]+')->middleware('auth');
Route::get('/console/deliveries/edit/{delivery:id}', [DeliveriesController::class, 'editForm'])->where('delivery', '[0-9]+')->middleware('auth');
Route::post('/console/deliveries/edit/{delivery:id}', [DeliveriesController::class, 'edit'])->where('delivery', '[0-9]+')->middleware('auth');