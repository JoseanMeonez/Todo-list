<?php

namespace App\Http\Controllers;

use	App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	// Connection to the Api model
	private $model;

	public function __construct() {
		// Initialize the model's object
		$this->model = new ApiModel();
		return $this->model;
	}

	// Getting all the task for blade view
	public function GetTasksAll()
	{
		// Extracting task's table data
		$data = $this->model->GetAllTasks();

		// Returning data as array
		return view("tasks", [
			'tasks' => $data
		]);
	}

	// This is for extract the data from out the app
	public function GetJSONTasks(string $sort = "scheduled")
	{
		// Defining the parameter for sort the data and
		// Extracting table data with a sort parameter
		$this->model->sortby = $sort;
		$data = $this->model->GetJSONTasks();

		// Return a json encoded response
		return response()->json($data);
	}

	// This extract the data from the indicated task
	public function FindTask(int $id)
	{
		// Filling model parameter and executing model method
		$this->model->taskid = $id;
		$data = $this->model->FindTask();

		// Return a json encoded response
		return response()->json($data);
	}

	// This create a new task on the main table
	public function AddTask(string $task, string $scheduled)
	{
		// Setting by default a timezone and using it as default value and filling $task
		date_default_timezone_set('America/Tegucigalpa');
		$this->model->scheduled = (empty($scheduled)) ? date("Y-m-d", strtotime('tomorrow')) : $scheduled ;
		$this->model->task = $task;

		// Inserting the received data on the todo-list table
		$query = $this->model->AddTask();

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
		// Calling the model method
		$query = $this->model->Delete_compl_tasks();

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
		// Calling model method
		$query = $this->model->Delete_all_tasks();

		// Response text
		if ($query == true) {
			return "Tareas eliminadas exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar el estado de la tarea.";
		}
	}

	// Update the done field as 1 for the indicated task
	public function Completed_task(int $id, bool $done)
	{
		// Setting the parameters needed
		$this->model->taskid = $id;
		$this->model->done = $done;

		// Calling model method
		$query = $this->model->Completed_task();

		// Response text
		if ($query == true) {
			return "Tarea actualizada exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar la tarea.";
		}
	}

	// Update the task's fields indicated
	public function Update_task(string $text, $scheduled, int $id)
	{
		// Setting the parameters needed
		$this->model->task = $text;
		$this->model->taskid = $id;

		// Setting a default value for the scheduled date if is empty
		$scheduled = (empty($scheduled)) ?
			json_decode($this->model->Get_Scheduled_Date())
		: $scheduled;

		// Setting the final parameter
		$this->model->scheduled = (is_array($scheduled)) ? $scheduled[0]['scheduled'] : $scheduled;

		// Calling model method
		$query = $this->model->Update_task();

		// Response text
		if ($query == true) {
			return "Tarea actualizada exitosamente.";
		} else {
			return "Lo sentimos, no se pudo actualizar la tarea.";
		}
	}
}
