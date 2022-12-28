<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/task/{task}/{scheduled}', [ApiController::class, 'addTask']);
Route::get('/getTasks', [ApiController::class, 'getTasksAll']);