<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\medicationcontroller;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
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
// Route::get('/', function () {
//     return view('welcome');
// });
///////////////////////////////////////////////////////////////////////////////
Route::get('/displaymed',[CompanyController::class,'displaymed'])->name('displaymed');
Route::get('/index',[CompanyController::class,'displaymed'])->name('index');
Route::get('/',function(){ return view('login');});
Route::post('/login',[CompanyController::class,'login'])->name('login');
Route::get('/create1',function(){return view('create');})->name('create1');
Route::post('/create',[CompanyController::class,'create'])->name('create');
Route::get('/addmed',function(){return view('addmed');})->name('addmed');
Route::post('/storemed',[CompanyController::class,'storemed'])->name('storemed');
Route::get('/showorder{id}',[CompanyController::class,'showorder'])->name('showorder');
Route::get('/confirm/{id}',[CompanyController::class,'confirm'])->name('confirm');
Route::post('/contact',[CompanyController::class,'contact'])->name('contact');
Route::get('/addrecipe/{id}',[CompanyController::class,'addrecipe'])->name('addrecipe');
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
Route::get('/login2',function(){return view ('pages.login');});
Route::post('/loginware',[WarehouseController::class,'login'])->name('loginware');
Route::get('/create2',function(){return view('pages.create');})->name('create2');
Route::post('/createware',[WarehouseController::class,'create'])->name('createware');
Route::get('/main',[WarehouseController::class,'displaycompany'])->name('main');
Route::get('/display',[WarehouseController::class,'displaymed'])->name('display');
Route::get('/display2/{id}',[WarehouseController::class,'displaydetailmed'])->name('display2');
Route::get('/delete/{id}',[WarehouseController::class,'deletemed'])->name('deletemed');
Route::get('/discount',[WarehouseController::class,'discount'])->name('discount');
Route::post('/storediscount/{id}',[WarehouseController::class,'storediscount'])->name('storediscount');
Route::get('/discount2/{id}',[WarehouseController::class,'discountdetail'])->name('discount2');
Route::get('/shope/{id}',[WarehouseController::class,'displaymedcompany'])->name('shope');
Route::get('/add/{id}',[WarehouseController::class,'addorder'])->name('add');
Route::post('/addmedone/{id}',[WarehouseController::class,'addmedone'])->name('addmedone');
Route::get('/cart',[WarehouseController::class,'viewcart'])->name('cart');
Route::get('/thank',function(){return view ('pages.thank');})->name('thank');
Route::get('/order',[WarehouseController::class,'order'])->name('order');
Route::get('/orderdetail/{id}',[WarehouseController::class,'orderdetail'])->name('orderdetail');
Route::get('/orderdelivery/{id}',[WarehouseController::class,'orderdelivery'])->name('orderdelivery');
