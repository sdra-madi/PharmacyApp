<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\WarehouseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('pharmacist')->group(function () {
    Route::post('/create', [PharmacistController::class, 'createaccount']);
    Route::post('/login', [PharmacistController::class, 'login']);
    Route::post('/verfiycode', [PharmacistController::class, 'verfiycode']);
});
Route::prefix('warehouse')->group(function () {
    Route::post('/get', [WarehouseController::class, 'getallwarehouses']);
    Route::post('/getdetail', [WarehouseController::class, 'getdetailsofwarehouse']);
    Route::post('/infav', [WarehouseController::class, 'getwarehouseinfav']);
    Route::post('/knowcompany', [WarehouseController::class, 'getcompany']);
    Route::post('/showdiscount', [WarehouseController::class, 'showdiscount']);
});
Route::prefix('medication')->group(function () {
    Route::post('/get', [MedicationController::class, 'getallmedication']);
    Route::post('/search', [MedicationController::class, 'search']);
    Route::post('/searchmed', [MedicationController::class, 'searchmed']);
    Route::post('/detailofmed', [MedicationController::class, 'detailofmed']);
});
Route::prefix('favorite')->group(function () {
    Route::post('/addwarehouse', [FavoriteController::class, 'addwarehouse']);
    Route::post('/deletewarehouse', [FavoriteController::class, 'deletewarehouse']);
    Route::post('/addmedicain', [FavoriteController::class, 'addmedicain']);
    Route::post('/deletemedicain', [FavoriteController::class, 'deletemedicain']);
    Route::post('/showfavmedicatioes', [FavoriteController::class, 'showfavmedicatioes']);
    Route::post('/showfavwarehouses', [FavoriteController::class, 'showfavwarehouses']);
    Route::post('/detailfavmedication', [FavoriteController::class, 'detailfavmedication']);
});
Route::prefix('order')->group(function () {
    Route::post('/new_way',[OrderController::class,'addOrderPharmacists']);
    Route::post('/orderNotDelivery',[OrderController::class,'orderNotDelivery']);
    Route::post('/orderDeliver',[OrderController::class,'orderDeliver']);
    Route::post('/detailOrder',[OrderController::class,'detailOrder']);
    Route::post('/deleteOrder',[OrderController::class,'deleteOrder']);
    Route::post('/updateOrder',[OrderController::class,'updateOrder']);
});
