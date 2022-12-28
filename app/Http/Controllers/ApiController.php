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

		// return response()->json($data);
		return view("tasks", [
			'tasks' => $data
		]);
	}

	public function findTask(int $id)
	{
		$data = DB::table('todo-list')->find($id);

		return response()->json($data);
	}

	public function addTask(string $task, $scheduled, Request $request)
	{
		date_default_timezone_set('America/Tegucigalpa');
		$scheduled = (empty($scheduled)) ? date("Y-m-d", strtotime('tomorrow')) : $scheduled ;
		
		$query = DB::table('todo-list')->insert([
			'todo_text' => "$task",
			'done' => 0,
			'scheduled' => $scheduled,
			'status' => 1
		]);

		if ($query == true) {
			return array(
				"info" => $query,
				"response_text" => "Agregado exitosamente.",
				"color" => "success"
			);
		} else {
			return array(
				"info" => $query,
				"response_text" => "Lo sentimos, ocurrió un error al intentar subir los datos.",
				"color" => "danger"
			);
		}
	}
}
