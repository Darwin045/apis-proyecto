<?php

use Illuminate\Support\Facades\Route;

// ruta de  answer
use App\Http\Controllers\AnswerController;
Route::resource(' ', AnswerController::class);

//ruta de /socks
use App\Http\Controllers\SockController;
Route::resource('socks', SockController::class);

// ruta de notifications
use App\Http\Controllers\NotificationController;
Route::resource('notifications', NotificationController::class);


