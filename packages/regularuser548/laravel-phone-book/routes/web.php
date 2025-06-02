<?php

use Illuminate\Support\Facades\Route;
use Regularuser548\LaravelPhoneBook\Http\Controllers\ContactController;

Route::middleware('web')->group(function () {
    Route::resource('contacts', ContactController::class)->only(['index', 'store', 'destroy']);
});
