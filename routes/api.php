<?php

use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\SachController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'nguoi-dung'], function () {
    Route::get('/', [NguoiDungController::class, 'getData']);
    Route::post('/', [NguoiDungController::class, 'store']);
    Route::put('/{id}', [NguoiDungController::class, 'update']);
    Route::delete('/{id}', [NguoiDungController::class, 'delete']);
});

Route::group(['prefix' => 'sach'], function () {
    Route::get('/', [SachController::class, 'getData']);
    Route::post('/', [SachController::class, 'store']);
    Route::get('/{id_sach}', [SachController::class, 'show']);
    Route::put('/{id_sach}', [SachController::class, 'update']);
    Route::delete('/{id_sach}', [SachController::class, 'delete']); 
});

