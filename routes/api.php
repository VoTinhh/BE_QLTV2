<?php

use App\Http\Controllers\PhieuMuonController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\LichSuMuonController;
use App\Http\Controllers\ThanhToanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'phieu-muon'], function () {
    Route::get('/', [PhieuMuonController::class, 'getData']);
    Route::post('/', [PhieuMuonController::class, 'create']);
    Route::put('/{id}', [PhieuMuonController::class, 'update']);
    Route::delete('/{id}', [PhieuMuonController::class, 'delete']);
    Route::post('/tim-kiem', [PhieuMuonController::class, 'search']);
});

Route::group(['prefix' => 'hoa-don'], function () {
    Route::get('/', [HoaDonController::class, 'getData']);
    Route::post('/', [HoaDonController::class, 'create']); 
    Route::put('/{id}', [HoaDonController::class, 'update']);
    Route::delete('/{id}', [HoaDonController::class, 'delete']);
});

Route::group(['prefix' => 'lich-su-muon'], function () {
    Route::get('/', [LichSuMuonController::class, 'getData']); 
    Route::post('/', [LichSuMuonController::class, 'create']); 
    Route::put('/{id}', [LichSuMuonController::class, 'update']); 
    Route::delete('/{id}', [LichSuMuonController::class, 'delete']); 
    Route::get('/phieu-muon/{id_phieu_muon}', [LichSuMuonController::class, 'getDataByPhieuMuon']);
});


Route::group(['prefix' => 'thanh-toan'], function () {
    Route::get('/', [ThanhToanController::class, 'getData']); 
    Route::post('/', [ThanhToanController::class, 'create']); 
    Route::put('/{id}', [ThanhToanController::class, 'update']); 
    Route::delete('/{id}', [ThanhToanController::class, 'delete']); 
});
