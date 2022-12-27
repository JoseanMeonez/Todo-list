@extends('layouts.app')

@section('content')
	<div class="card mx-5 shadow">
		<div class="card-body">
			<div class="input-group rounded">
				<input type="text" class="form-control">
				<input type="button" class="input-group-text btn fw-bold btn-primary" id="add-todo" value="Add Todo" >
				<input type="button" class="input-group-text btn fw-bold btn-danger" id="add-todo" value="Remove All" >
				<input type="button" class="input-group-text btn fw-bold btn-success" id="add-todo" value="Remove completed tasks" >
			</div>
		</div>
	</div>
@endsection