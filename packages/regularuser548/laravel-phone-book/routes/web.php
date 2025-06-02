<?php

use Illuminate\Support\Facades\Route;
use Regularuser548\LaravelPhoneBook\Http\Controllers\ContactController;

Route::resource('contacts', ContactController::class);
