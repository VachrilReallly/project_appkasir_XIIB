<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::middleware(['guest'])->group(function(){
Route::get('/',[SesiController::class, 'index'])->name('login');
Route::post('/',[SesiController::class, 'login']);
});
Route::get('/home',function(){
    return redirect('/dashboard'); 
});

Route::middleware(['auth'])->group(function(){

Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/dashboard/operator',[DashboardController::class, 'operator'])->Middleware('userAkses:operator');
Route::get('/dashboard/keuangan',[DashboardController::class, 'keuangan'])->Middleware('userAkses:keuangan');
Route::get('/dashboard/marketing',[DashboardController::class, 'marketing'])->Middleware('userAkses:marketing');
Route::get('/logout',[SesiController::class, 'logout']);
});
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi');
Route::get('/laporan-penjualan', [App\Http\Controllers\LaporanPenjualanController::class, 'index'])->name('laporan-penjualan');
Route::get('/manajemen-produk', [App\Http\Controllers\ManajemenProdukController::class, 'index'])->name('manajemen-produk');

Route::post('/logout', function () {
    
    return redirect('/login');
})->name('logout');