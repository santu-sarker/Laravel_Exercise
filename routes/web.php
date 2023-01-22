<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UserController::class, 'index']);
Route::post('contact/add_contact', [ContactController::class, 'add_contact']);
Route::post('/contact/delete_contact', [ContactController::class, 'delete_contact']);
// Route::get('/test', [ContactController::class, 'delete_contact']);

// Route::post('/logout', LogoutController::class, 'logout');
// Route::get("/login", function () {
//     return view("pages.auth.login");
// });

// Route::get("/register", function () {
//     return view("pages.auth.user_registration");
// });