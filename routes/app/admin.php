<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\KritikSaranController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PengumumanController;

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

Route::group(['domain' => ''], function () {
    Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function () {
        Route::redirect('/', 'dashboard', 301);
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [HomeController::class, 'favorit'])->name('dashboard');
        Route::get('/login', [AuthController::class, 'login'])->name('auth.index');
        Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

        Route::resource('/food', ProductController::class);
        Route::resource('/ruangan', RuanganController::class);
        Route::resource('/kritik', KritikSaranController::class);
        Route::get('/kritik/export-pdf', [KritikSaranController::class, 'show'])->name('kritik.export.pdf');
        Route::resource('/pengaduan', PengaduanController::class);
        Route::get('/pengaduan/export-pdf', [PengaduanController::class, 'show'])->name('pengaduan.export.pdf');
        Route::get('/history', [BookingController::class, 'index'])->name('history.index');
        Route::delete('/history/{id}/delete', [BookingController::class, 'destroy'])->name('history.destroy');
        Route::put('/history/{id}/accept', [BookingController::class, 'accept'])->name('history.accept');
        Route::put('/history/{id}/reject', [BookingController::class, 'reject'])->name('history.reject');
        Route::put('/history/{id}/finish', [BookingController::class, 'finish'])->name('history.finish');
        Route::get('/history/export-pdf', [BookingController::class, 'exportPDF'])->name('history.export.pdf');

        Route::get('/historyorder', [OrderController::class, 'index'])->name('historyorder.index');
        Route::get('/historyorder/{order}/show', [OrderController::class, 'show'])->name('historyorder.show');
        Route::get('/historyorder/export-pdf', [OrderController::class, 'exportPDF'])->name('historyorder.export.pdf');
        Route::delete('/historyorder/{id}/destroy', [OrderController::class, 'destroy'])->name('historyorder.destroy');
        Route::put('/historyorder/{id}/accept', [OrderController::class, 'accept'])->name('historyorder.accept');
        Route::put('/historyorder/{id}/reject', [OrderController::class, 'reject'])->name('historyorder.reject');
        Route::put('/historyorder/{id}/finish', [OrderController::class, 'finish'])->name('historyorder.finish');

        Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');

        Route::get('/auth', function () {
            return view('pages.auth.login');
        });
        Route::get('/authreg', function () {
            return view('pages.auth.register');
        });
        Route::get('/admin', function () {
            return view('pages.admin.dashboard.home');
        });
    });
});
