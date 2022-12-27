@extends('layouts.app')

@section('content')
	<form action="{{route('home')}}" class="card shadow mb-3 border-0">
		<div class="input-group">
			<input type="text" class="form-control border-1" id="task" placeholder="Write a new Task">
			<button type="submit" class="input-group-text btn btn-primary" title="Add Task" id="add-todo">
				<i class="bi bi-plus-lg fs-5"></i>
			</button>
			<button type="button" class="input-group-text btn btn-danger" title="Remove All" id="add-todo">
				<i class="bi bi-trash-fill fs-5"></i>					
			</button>
			<button type="button" class="input-group-text btn btn-success" title="Remove completed tasks" id="add-todo">
				<i class="bi bi-ui-checks fs-5"></i>
			</button>
		</div>
	</form>
	@yield('tasks')
@endsection