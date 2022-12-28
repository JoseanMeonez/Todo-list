<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	public function GetTasksAll()
	{
		$data = DB::table('todo_list')
		->where('status',1)
		->orderByRaw('scheduled')
		->get();

		// return response()->json($data);
		return view("tasks", [
			'tasks' => $data
		]);
	}

	public function FindTask(int $id)
	{
		$data = DB::table('todo_list')->find($id);

		return response()->json($data);
	}

	public function AddTask(string $task, $scheduled, Request $request)
	{
		date_default_timezone_set('America/Tegucigalpa');
		$scheduled = (empty($scheduled)) ? date("Y-m-d", strtotime('tomorrow')) : $scheduled ;
		
		$query = DB::table('todo_list')->insert([
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

	public function Delete_compl_tasks()
	{
		$query = DB::table('todo_list')
		->where('done', 1)
		->update(['status' => 0]);

		if ($query == true) {
			return "Tareas eliminadas exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar el estado de la tarea.";
		}
	}

	public function Delete_all_tasks()
	{
		$query = DB::table('todo_list')
		->update(['status' => 0]);

		if ($query == true) {
			return "Tareas eliminadas exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar el estado de la tarea.";
		}
	}

	public function Completed_task(int $id, int $done)
	{
		$query = DB::table('todo_list')
		->where('id', $id)
		->update(['done' => $done]);

		if ($query == true) {
			return "Tarea actualizada exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar la tarea.";
		}
	}
}
