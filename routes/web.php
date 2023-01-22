<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UserController::class, 'index']);
Route::post('contact/add_contact', [ContactController::class, 'add_contact']);
Route::post('/contact/delete_contact', [ContactController::class, 'delete_contact']);
