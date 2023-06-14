<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/karyawan/{nik}', [KaryawanController::class, 'show']);
Route::post('/presensi', [PresensiController::class, 'absenMasuk']);
Route::get('/get_presensi/{nik}', 'App\Http\Controllers\PresensiController@index');
Route::post('/absen_keluar', 'App\Http\Controllers\PresensiController@absenKeluar');
