<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Main\Domain\Task\Controllers\Controller as MainController;
use Main\Domain\Status\Controllers\Controller as StatusController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('task')->name('task-')->group(function () {
    Route::get('', [MainController::class, 'index'])->name('index');
    Route::post('', [MainController::class, 'create'])->name('create');
    Route::put('{task}', [MainController::class, 'update'])->name('update');
    Route::delete('{task}', [MainController::class, 'delete'])->name('delete');
});

Route::prefix('status')->name('status-')->group(function () {
    Route::get('', [StatusController::class, 'index'])->name('index');
    Route::post('', [StatusController::class, 'create'])->name('create');
    Route::put('{task}', [StatusController::class, 'update'])->name('update');
    Route::delete('{task}', [StatusController::class, 'delete'])->name('delete');
});
