<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	// Getting all the task for blade view
	public function GetTasksAll()
	{
		// Extracting table data
		$data = DB::table('todo_list')
		->where('status',1)
		->orderByRaw('scheduled')
		->get();

		// Returning data as array
		return view("tasks", [
			'tasks' => $data
		]);
	}

	// This is for extract the data from out the app
	public function GetJSONTasks(string $sortby = "scheduled")
	{
		// Extracting table data with a sort parameter
		$data = DB::table('todo_list')
		->where('status',1)
		->orderByRaw($sortby)
		->get();

		// Return a json encoded response
		return response()->json($data);
	}

	// This extract the data from the indicated task
	public function FindTask(int $id)
	{
		$data = DB::table('todo_list')->find($id);

		return response()->json($data);
	}

	// This create a new task on the main table
	public function AddTask(string $task, $scheduled)
	{
		// Setting by default a timezone and using it as default value
		date_default_timezone_set('America/Tegucigalpa');
		$scheduled = (empty($scheduled)) ? date("Y-m-d", strtotime('tomorrow')) : $scheduled ;
		
		// Inserting the received data on the todo_list table
		$query = DB::table('todo_list')->insert([
			'todo_text' => "$task", 		// Task text
			'done' => 0,								// 1 if the task is marked, 0 if isn't marked
			'scheduled' => $scheduled,	// Scheduled date
			'status' => 1								// 1 if isn't deleted, 0 if it's deleted
		]);

		// Response data
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

	// This set the completed task's status as 0
	public function Delete_compl_tasks()
	{
		// Updating using query builder
		$query = DB::table('todo_list')
		->where('done', 1)
		->update(['status' => 0]);

		// Response text
		if ($query == true) {
			return "Tareas eliminadas exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar el estado de la tarea.";
		}
	}

	// This set all the task's status as 0
	public function Delete_all_tasks()
	{
		// Updating using query builder

		$query = DB::table('todo_list')
		->update(['status' => 0]);

		// Response text
		if ($query == true) {
			return "Tareas eliminadas exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar el estado de la tarea.";
		}
	}

	// Update the done field as 1 for the indicated task
	public function Completed_task(int $id, int $done)
	{
		// Updating using query builder
		$query = DB::table('todo_list')
		->where('id', $id)
		->update(['done' => $done]);

		// Response text
		if ($query == true) {
			return "Tarea actualizada exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar la tarea.";
		}
	}

	// Update the task's fields indicated
	public function update_task(string $text, $scheduled, int $id)
	{
		// Setting a default value for the scheduled date if is empty
		$scheduled = (empty($scheduled)) ? 
			DB::table('todo_list')->where('id', $id)->get()
		: $scheduled;

		// Updating using query builder
		$query = DB::table('todo_list')
		->where('id', $id)
		->update([
			'todo_text' => $text,
			'scheduled' => $scheduled
		]);

		// Response text
		if ($query == true) {
			return "Tarea actualizada exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar la tarea.";
		}
	}
}
