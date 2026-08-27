<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contact\ContactController;

Route::get('/', function () {
    return view('welcome');
});


 Route::post('/contact', [ContactController::class, 'send']) ->name('contact.send');