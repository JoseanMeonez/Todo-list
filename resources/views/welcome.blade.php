@extends('layouts.app')

@section('content')
	<div class="card mx-5 shadow">
		<div class="card-body">
			<div class="input-group rounded">
				<input type="text" class="form-control" placeholder="Write a new Task">
				<button type="button" class="input-group-text btn btn-primary" title="Add Task" id="add-todo">
					<i class="bi bi-plus-lg fs-5"></i>
				</button>
				<button type="button" class="input-group-text btn btn-danger" title="Remove All" id="add-todo">
					<i class="bi bi-trash-fill fs-5"></i>					
				</button>
				<button type="button" class="input-group-text btn btn-success" title="Remove completed tasks" id="add-todo">
					<i class="bi bi-list-check fs-5"></i>
				</button>
			</div>
		</div>
	</div>
@endsection