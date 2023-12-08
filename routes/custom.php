<?php

use Illuminate\Support\Facades\Route;

Route::get('/custom', function () {
    return "custom";
})->middleware('check_role:admin');
