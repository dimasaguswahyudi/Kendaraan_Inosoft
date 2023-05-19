<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('getpenjualan/{kendaraan_id}', [PenjualanController::class, 'getPenjualan'])->name('penjualan.getpenjualan');
    Route::get('kendaraan/stok',[KendaraanController::class, 'getstok'])->name('kendaraan.stok');
    Route::apiResources([
        'kendaraan' => KendaraanController::class,
        'mobil' => MobilController::class,
        'motor' => MotorController::class,
        'penjualan' => PenjualanController::class,
    ]);
});
