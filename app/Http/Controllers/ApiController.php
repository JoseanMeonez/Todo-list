<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	public function getTasksAll()
	{
		$data = DB::table('todo-list')
		->orderByRaw('id')
		->get();

		return response()->json($data);
	}

	public function addTask(string $task, $scheduled)
	{
		$scheduled = (empty($scheduled)) ? date("Y-m-d", strtotime('tomorrow')) : $scheduled ;
		DB::table('todo-list')->insert([
			'todo-text' => "$task",
			'done' => 0,
			'scheduled' => $scheduled,
			'status' => 1
		]);

		return "Agregado exitosamente.";
	}
}
