<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiModel extends Model
{
	use HasFactory;
	public string $sortby;

	// This return the task list data
	public function GetAllTasks()
	{
		return DB::table('todo_list')
		->where('status',1)
		->orderByRaw('scheduled')
		->get();
	}

	// This allows to extract the data from outside the app 
	public function GetJSONTasks()
	{
		return DB::table('todo_list')
		->where('status',1)
		->orderByRaw($this->sortby)
		->get();
	}
}
