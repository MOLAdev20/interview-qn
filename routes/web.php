<?php

use App\Http\Controllers\ServiceTicketController;
use Illuminate\Support\Facades\Route;

Route::prefix('service-ticket')->group(function () {
    Route::get('/', [ServiceTicketController::class, 'index'])->name('service-ticket');

    Route::prefix('api')->group(function () {
        Route::get("/", [ServiceTicketController::class, 'getAll']);
        Route::post("/", [ServiceTicketController::class, 'store']);
        Route::get('/{id}', [ServiceTicketController::class, 'detail']);
        Route::delete('/{id}', [ServiceTicketController::class, 'remove']);
        Route::put('/change-status/{id}', [ServiceTicketController::class, 'changeStatus']);
        Route::put('/{id}', [ServiceTicketController::class, 'update']);
    });
});
