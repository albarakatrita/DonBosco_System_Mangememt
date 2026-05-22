<?php

use App\Http\Controllers\PublicFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/forms/{slug}', [PublicFormController::class, 'show'])
    ->name('forms.public.show');
