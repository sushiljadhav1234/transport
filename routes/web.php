<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobsTagController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouses;

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

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.post');
Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('/userlist',[UserController::class, 'index'])->name('user');
Route::get('user',[UserController::class, 'list'])->name('user.list');
Route::get('/add-user',[UserController::class, 'add'])->name('user.add');
Route::post('/userstore',[UserController::class,'store'])->name('user.store');
Route::get('/update/user{id}',[UserController::class,'getUser'])->name('user.edit');
Route::post('/update/user',[UserController::class,'updateUser'])->name('user.update');
Route::get('/clients',[ClientController::class,'index'])->name('client.index');
Route::get('/client-List',[ClientController::class,'list'])->name('client.list');
Route::get('/client-add',[ClientController::class,'add'])->name('client.add');
Route::post('client-store',[ClientController::class,'store'])->name('client.store');
Route::post('/client_details',[ClientController::class,'details'])->name('client.getdetails');
Route::get('/client_edit/{id}',[ClientController::class,'edit'])->name('client.edit');
Route::post('/client_update',[ClientController::class,'update'])->name('client.update');
Route::post('/client_getdetails',[ClientController::class,'fetch_details'])->name('client.getclient_details');
Route::post('/client_getdetails',[ClientController::class,'fetchdetails'])->name('client.getclient_details1');
Route::post('/client_fetchdetails',[ClientController::class,'get_details'])->name('client.updateDetails');
Route::get('/client-details/{id}',[ClientController::class,'detailsview'])->name('client.details');
Route::get('client-archieved',[ClientController::class,'archieve'])->name('client.archieve');
Route::get('/client-quote-List', [ClientController::class, 'client_quote_list'])->name('client.quoteList');


Route::get('/jobstag',[JobsTagController::class,'index'])->name('jobstag.index');
Route::get('/jobslist',[JobsTagController::class,'list'])->name('getjobstags');
Route::get('/Jobsag-add',[JobsTagController::class,'add'])->name('jobstag.add');
Route::post('/jobstag-store',[JobsTagController::class,'store'])->name('jobstag.store');
Route::get('/jobstag-edit/{id}',[JobsTagController::class,'edit'])->name('jobstag.edit');
Route::post('/jobstag-update',[JobsTagController::class,'update'])->name('jobstag.update');

Route::get('warehouse',[WarehouseController::class, "index"])->name('warehouse.index');
Route::get('warehouse-list',[WarehouseController::class,'list'])->name('getwarehouse');


Route::get('warehouse-edit/{id}',[WarehouseController::class,'edit'])->name('warehouse.edit');
Route::post('warehouse-update',[WarehouseController::class,'update'])->name('warehouse.update');
Route::post('warehouse-delete',[WarehouseController::class,'delete'])->name('warehouse.delete');
