<?php

use App\Http\Controllers\Apps\SuperAdmin\MenusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/getMenus', [MenusController::class, 'fetchMenus'])->name('getMenus');
});

