<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/add-new-task/{task}/{scheduled}', [ApiController::class, 'addTask']);
Route::get('/get-tasks', [ApiController::class, 'getTasksAll']);
Route::get('/find-task/{id}', [ApiController::class, 'findTask']);