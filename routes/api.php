<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

// Create and update data api routes
Route::post('/add-new-task/{task}/{scheduled}', [ApiController::class, 'AddTask']);
Route::put('/completed-task/{id}/{done}', [ApiController::class, 'Completed_task']);
Route::put('/update-task/{text}/{scheduled}/{id}', [ApiController::class, 'Update_task']);

// Delete api routes
Route::delete('/delete-completed', [ApiController::class, 'Delete_compl_tasks']);
Route::delete('/delete-all', [ApiController::class, 'Delete_all_tasks']);

// Get data api routes
Route::get('/get-tasks-json/{sortby?}', [ApiController::class, 'GetJSONTasks']);
Route::get('/get-tasks', [ApiController::class, 'GetTasksAll']);
Route::get('/find-task/{id}', [ApiController::class, 'FindTask']);