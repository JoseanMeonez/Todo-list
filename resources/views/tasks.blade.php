@extends('welcome')
@section('tasks')
	<div class="list-group">
		<div class="input-group">
			<div class="list-group-item list-group-item-action" aria-current="true">
				<div class="d-flex w-100 justify-content-between">
					<p class="mb-1 task-text" id="tt-1">Some placeholder content in a paragraph.</p>
					<input type="checkbox" class="check" onclick="$ch3ck3d('tt-1', this.getAttribute('id'))" id="2" value=0>
				</div>
				<small id="sch-">3 days ago</small>	
			</div>
		</div>
		{{-- <a href="#" class="list-group-item list-group-item-action">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1">List group item heading</h5>
				<small class="text-muted">3 days ago</small>
			</div>
			<p class="mb-1">Some placeholder content in a paragraph.</p>
			<small class="text-muted">And some muted small print.</small>
		</a>
		<a href="#" class="list-group-item list-group-item-action">
			<div class="d-flex w-100 justify-content-between">
				<h5 class="mb-1">List group item heading</h5>
				<small class="text-muted">3 days ago</small>
			</div>
			<p class="mb-1">Some placeholder content in a paragraph.</p>
			<small class="text-muted">And some muted small print.</small>
		</a> --}}
	</div>
@endsection