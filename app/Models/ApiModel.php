<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiModel extends Model
{
	use HasFactory;
	public string $sortby, $task, $scheduled;
	public int $taskid;
	public bool $done;

	// This return the task list data
	public function GetAllTasks() {
		return DB::table('todo-list')
		->where('status',1)
		->orderByRaw('scheduled')
		->get();
	}

	// This allows to extract the data from outside the app
	public function GetJSONTasks() {
		return DB::table('todo-list')
		->where('status',1)
		->orderByRaw($this->sortby)
		->get();
	}

	// Find a task by id
	public function FindTask() {
		return DB::table('todo-list')->find($this->taskid);
	}

	// Add a new task to the DB
	public function AddTask() {
		return DB::table('todo-list')->insert([
			'todo_text' => "$this->task", 		// Task text
			'done' => 0,											// 1 if the task is done, 0 if isn't done
			'scheduled' => $this->scheduled,	// Scheduled date
			'status' => 1,										// 1 if isn't deleted, 0 if it's deleted
			'added_date' => date("Y-m-d H:i:s")
		]);
	}

	// Delete the completed tasks
	public function Delete_compl_tasks() {
		return DB::table('todo-list')
		->where('done', 1)
		->update(['status' => 0]);
	}

	// Delete all the tasks that are available
	public function Delete_all_tasks() {
		return DB::table('todo-list')
		->update(['status' => 0]);
	}

	// Update the task's done status
	public function Completed_task() {
		return DB::table('todo-list')
		->where('id', $this->taskid)
		->update(['done' => $this->done]);
	}

	// Update the date scheduled and the task text
	public function Update_task() {
		return DB::table('todo-list')
		->where('id', $this->taskid)
		->update([
			'todo_text' => $this->task,
			'scheduled' => $this->scheduled
		]);
	}

	// Get the current date scheduled to complete a task
	public function Get_Scheduled_Date() {
		return DB::table('todo-list')
		->where('id', $this->taskid)
		->get(['scheduled']);
	}
}
