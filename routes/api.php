<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TurnstileController;
use App\Http\Controllers\EntryController;

Route::post('/register', [AuthController::class, 'register']);//AuthControllerdaki register() metodunu çalıştırıyoz burda

Route::post('/login', [AuthController::class, 'login']);

Route::post('/turnstiles/{turnstileId}/qr', [
    TurnstileController::class,
    'generateQr'//QR OLUŞTURMAK İÇİN GEREKLİ
]);

