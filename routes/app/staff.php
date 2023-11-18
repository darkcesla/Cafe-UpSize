<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Staff\OrderController;
use App\Http\Controllers\Staff\HomeController;
use App\Http\Controllers\Staff\BookingController;
use App\Http\Controllers\Staff\KritikSaranController;
use App\Http\Controllers\Staff\PengaduanController;

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
    Route::prefix('staff/')->name('staff.')->group(function () {
        Route::redirect('/', 'dashboard', 301);
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [HomeController::class, 'favorit'])->name('dashboard');
        Route::get('/login', [AuthController::class, 'login'])->name('auth.index');
        Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

        Route::resource('/kritik', KritikSaranController::class);
        Route::get('/historykritik/export-pdf', [KritikSaranController::class, 'show'])->name('historykritik.export.pdf');
        Route::resource('/historypengaduan', PengaduanController::class);
        Route::get('/historypengaduan/export-pdf', [PengaduanController::class, 'show'])->name('historypengaduan.export.pdf');
        Route::get('/historymeja', [BookingController::class, 'index'])->name('history.index');
        Route::delete('/historymeja/{id}/delete', [BookingController::class, 'destroy'])->name('historymeja.destroy');
        Route::put('/historymeja/{id}/accept', [BookingController::class, 'accept'])->name('historymeja.accept');
        Route::put('/historymeja/{id}/reject', [BookingController::class, 'reject'])->name('historymeja.reject');
        Route::put('/historymeja/{id}/finish', [BookingController::class, 'finish'])->name('historymeja.finish');
        Route::get('/historymeja/export-pdf', [BookingController::class, 'exportPDF'])->name('historymeja.export.pdf');

        Route::get('/historyproduk', [OrderController::class, 'index'])->name('historyproduk.index');
        Route::get('/historyproduk/{order}/show', [OrderController::class, 'show'])->name('historyproduk.show');
        Route::get('/historyproduk/export-pdf', [OrderController::class, 'exportPDF'])->name('historyproduk.export.pdf');
        Route::delete('/historyproduk/{id}/destroy', [OrderController::class, 'destroy'])->name('historyproduk.destroy');
        Route::put('/historyproduk/{id}/accept', [OrderController::class, 'accept'])->name('historyproduk.accept');
        Route::put('/historyproduk/{id}/reject', [OrderController::class, 'reject'])->name('historyproduk.reject');
        Route::put('/historyproduk/{id}/finish', [OrderController::class, 'finish'])->name('historyproduk.finish');

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
