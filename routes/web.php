<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\ControlController;

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

Route::view('/', 'bpjs.checkin');
Route::post('/check-in', [BpjsController::class, 'checkIn']);

Route::get('/controls', [ControlController::class, 'index'])->name('controls.index');
Route::get('/controls/list', [ControlController::class, 'list'])->name('controls.list');
Route::get('/cetak-surat-kontrol', [ControlController::class, 'cetakSuratKontrol'])->name('cetakSuratKontrol');