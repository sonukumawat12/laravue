<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'Login']);

// ✅ Protected Routes (Only accessible after login)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Example: Logout route (optional)
    Route::post('/logout', [AuthController::class, 'Logout']);
});
