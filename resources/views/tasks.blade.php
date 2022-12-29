@extends('welcome')
@section('tasks')
{{-- Checklist's' component --}}
<ul class="list-group shadow">
	@foreach ($tasks as $task)
		<li class="list-group-item">
			<div class="input-group">

				{{-- Validing each completed task --}}
				@if ($task->done == 0)
					{{-- Task completed --}}
					<input type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-{{$task->id}}', this.id)" id="{{ $task->id }}" value={{ $task->done }}>
				@else
					{{-- Task uncompleted --}}
					<input checked type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-{{$task->id}}', this.id)" id="{{ $task->id }}" value={{ $task->done }}>
				@endif

				{{-- Check label --}}
				<label class="form-check-label btn btn-sm btn-outline-primary fs-6" for="{{ $task->id }}"><i class="bi bi-check-lg"></i></label>

				{{-- Edit Checkbox and label --}}
				<input type="checkbox" class="form-check-input btn-check" onclick="edit_task('tt-{{$task->id}}', 'sch-{{$task->id}}', {{ $task->id }})" id="e-{{ $task->id }}">
				<label class="form-check-label btn btn-sm btn-outline-success fs-6" for="e-{{ $task->id }}"><i class="bi bi-pencil-fill fs-6"></i></label>
	
				{{-- Validing each completed task --}}
				@if ($task->done == 0)
					{{-- Task completed --}}
					<input type="text" class="form-control" value="{{ $task->todo_text }}" id="tt-{{$task->id}}" readonly>
				@else
					{{-- Task uncompleted --}}
					<input type="text" class="form-control ms-2 task-text text-decoration-line-through text-muted" value="{{ $task->todo_text }}" id="tt-{{$task->id}}" readonly>
				@endif

				<input type="date" class="btn btn-sm btn-outline-primary text-end" id="sch-{{$task->id}}" value="{{$task->scheduled}}" readonly/>
			</div>
		</li>
	@endforeach
</ul>
@endsection