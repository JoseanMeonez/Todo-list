@extends('welcome')
@section('tasks')
<ul class="list-group shadow">
  <li class="list-group-item">
		<input type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-1', this.getAttribute('id'))" id="2" value=0>
		<label class="form-check-label btn btn-sm btn-outline-primary fs-6" for="2"><i class="bi bi-check-lg"></i></label>
		<button type="button" class="input-group-text btn btn-sm btn-outline-success" title="Edit Task" id="add-todo">
			<i class="bi bi-pencil-fill fs-6"></i>
		</button>
    <label class="form-check-label ms-2 task-text" id="tt-1">Some placeholder content in a paragraph.</label>
    <label class="form-check-label ms-1 text-muted text-end" id="tt-1"> - Scheduled to 13-12-2022.</label>
  </li>
	<li class="list-group-item">
		<input type="checkbox" class="form-check-input btn-check" onclick="$ch3ck3d('tt-1', this.getAttribute('id'))" id="2" value=0>
		<label class="form-check-label btn btn-sm btn-outline-primary fs-6" for="2"><i class="bi bi-check-lg"></i></label>
		<button type="button" class="input-group-text btn btn-sm btn-outline-success" title="Edit Task" id="add-todo">
			<i class="bi bi-pencil-fill fs-6"></i>
		</button>
    <label class="form-check-label ms-2 task-text" id="tt-1">Some placeholder content in a paragraph.</label>
    <label class="form-check-label ms-1 text-muted text-end" id="tt-1"> - Scheduled to 13-12-2022.</label>
  </li>
</ul>
@endsection