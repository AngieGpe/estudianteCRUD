<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CareerController;

Route::get('/', function () {
    return redirect('/students');
});

Route::resource('students', StudentController::class);
Route::resource('careers', CareerController::class);
