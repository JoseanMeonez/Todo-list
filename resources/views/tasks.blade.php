@extends('welcome')
@section('tasks')
<ul class="list-group shadow">
	@foreach ($tasks as $task)
		<li class="list-group-item">
			{{-- Validing the done tasks --}}
			@if ($task->done == 0)
				<input type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-{{$task->id}}', this.getAttribute('id'))" id="{{ $task->id }}" value={{ $task->done }}>
			@else
				<input checked type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-{{$task->id}}', this.getAttribute('id'))" id="{{ $task->id }}" value={{ $task->done }}>
			@endif
			
			<label class="form-check-label btn btn-sm btn-outline-primary fs-6" for="{{ $task->id }}"><i class="bi bi-check-lg"></i></label>
			<button type="button" class="input-group-text btn btn-sm btn-outline-success" title="Edit Task" id="edit-todo-{{ $task->id }}">
				<i class="bi bi-pencil-fill fs-6"></i>
			</button>

			{{-- Validing the done tasks --}}
			@if ($task->done == 0)
				<label class="form-check-label ms-2 task-text" id="tt-{{$task->id}}">{{ $task->todo_text }}</label>	
			@else
				<label class="form-check-label ms-2 task-text text-decoration-line-through text-muted" id="tt-{{$task->id}}">{{ $task->todo_text }}</label>	
			@endif
			<label class="form-check-label ms-1 text-muted text-end"> - Scheduled to {{ $task->scheduled}}.</label>
		</li>
	@endforeach
</ul>
@endsection