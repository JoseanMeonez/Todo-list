@extends('layouts.app')

@section('content')
	{{-- Tasks' Form Component --}}
	<form action="{{ route('home') }}" class="card shadow border-0 mb-3">
		<div class="input-group">
			<input type="date" class="btn btn-sm btn-outline-primary" id="calendar"/>
			<input type="text" class="form-control border-1 bg-white" id="task" placeholder="Write a new Task">
			<button type="submit" class="input-group-text btn btn-primary" title="Add Task" id="add-todo">
				<i class="bi bi-plus-lg fs-5"></i>
			</button>
			<button type="button" class="input-group-text btn btn-success" title="Remove completed tasks" id="remove-done-t">
				<i class="bi bi-ui-checks fs-5"></i>
			</button>
			<button type="button" class="input-group-text btn btn-danger" title="Remove All" id="remove-all">
				<i class="bi bi-trash-fill fs-5"></i>					
			</button>
		</div>
	</form>
	@yield('tasks')
@endsection