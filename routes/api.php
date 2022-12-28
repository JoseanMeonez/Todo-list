<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/add-new-task/{task}/{scheduled}', [ApiController::class, 'AddTask']);
Route::post('/completed-task/{id}/{done}', [ApiController::class, 'Completed_task']);
Route::delete('/delete-completed', [ApiController::class, 'Delete_compl_tasks']);
Route::delete('/delete-all', [ApiController::class, 'Delete_all_tasks']);
Route::get('/get-tasks', [ApiController::class, 'GetTasksAll']);
Route::get('/find-task/{id}', [ApiController::class, 'FindTask']);