<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\globalContact;
use App\Http\Controllers\PhoneVerification;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// auth middleware defined in usercontroller
Route::get('/home', [UserController::class, 'index']);
Route::get('/', function () {
    return Redirect::to('/home');
});
// phone number verify routes
Route::middleware('phone_not_verified')->group(function () {

    Route::get('/phone_verification', [PhoneVerification::class, 'index'])->name('phone_verification');
    Route::get('/resend_email', [PhoneVerification::class, 'resend_email']);
    Route::post('/confirm_verification', [PhoneVerification::class, 'confirm_verification']);
});

// personal contact routes

Route::post('contact/add_contact', [ContactController::class, 'add_contact'])->name('add_contact');
Route::post('contact/edit_contact', [ContactController::class, 'edit_contact'])->name('edit_contact');
Route::post('/contact/delete_contact', [ContactController::class, 'delete_contact'])
    ->name('delete_contact');

Route::get("/contact/company_names", [ContactController::class, 'company_names']);

// global contact  route
Route::middleware(['auth', 'phone_verified'])->group(function () {

    Route::get('global_contact', [globalContact::class, 'index']);
    Route::get('global_contact/add_contact', [globalContact::class, 'create_contact_view']);
    Route::get("global_contact/my_contact", [globalContact::class, 'my_contacts']);
    Route::get('global_contact/{id}', [globalContact::class, 'global_contact_details']);
    Route::post('global_contact/add_contact', [globalContact::class, 'create_contact_store'])->name('global_add_contact');

// global contact add  update delete action rout
    Route::get('global_contact/add_to_contact/{id}', [globalContact::class, 'add_to_my_contacts']);
    Route::get('global_contact/delete/{id}', [globalContact::class, 'delete_contact']);
    Route::post('global_contact/edit_contact', [globalContact::class, 'edit_contact']);
});

Route::get('/test', [UserController::class, 'test']);
