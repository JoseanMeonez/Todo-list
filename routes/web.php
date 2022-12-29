<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

// Main route used
Route::get("/", [ApiController::class, 'getTasksAll'])->name('home');