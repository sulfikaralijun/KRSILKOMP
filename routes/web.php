<?php

use App\Http\Controllers\Apps\DashboardController;
use App\Http\Controllers\Apps\Dosen\DaftarNilaiController;
use App\Http\Controllers\Apps\KelasController;
use App\Http\Controllers\Apps\Mahasiswa\PengajuanController;
use App\Http\Controllers\Apps\PembelajaranController;
use App\Http\Controllers\Apps\PraktikumController;
use App\Http\Controllers\Apps\SuperAdmin\MenusController;
use App\Http\Controllers\Apps\SuperAdmin\RolesController;
use App\Http\Controllers\Apps\SuperAdmin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('login'));

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('manage-menus', MenusController::class);
        Route::resource('manage-roles', RolesController::class);
        Route::resource('manage-users', UsersController::class);
    });

    Route::middleware(['role:mahasiswa|dosen|asisten'])->group(function () {
        Route::resource('pengajuan', PengajuanController::class);
        Route::post('get-completion', [PengajuanController::class, 'getCompletion'])->name('get-completion');
        Route::resource('pembelajaran', PembelajaranController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('praktikum', PraktikumController::class);
    });

    Route::middleware(['role:dosen|asisten'])->group(function () {
        Route::resource('daftar-nilai', DaftarNilaiController::class);
    });
});
