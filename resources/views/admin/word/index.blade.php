@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<div class="card mb-4">
	<div class="card-header">
		Create Definition
	</div>
	<div class="card-body">
		@if($errors->any())
			<ul class="alert alert-danger list-unstyled">
				@foreach($errors->all() as $error)
				<li>- {{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<form method="POST" action="{{ route('admin.word.store') }}">
			@csrf
				
			<div class="mb-3">
				<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Word:</label>
				<div class="col-lg-10 col-md-6 col-sm-12">
					<input name="word" value="{{ old('word') }}" type="text" class="form-control">
				</div>
			</div>
				
			<div class="mb-3">
				<label class="form-label">Definition:</label>
				<textarea class="form-control" name="definition" rows="3">{{ old('definition') }}</textarea>
			</div>

			<div class="mb-3">
				<label class="form-label">Example:</label>
				<textarea class="form-control" name="example" rows="3">{{ old('example') }}</textarea>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

<div class="card">
<div class="card-header">
Manage Definitions
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Word</th>
			<th scope="col">Edit</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($viewData["words"] as $word)
			<tr>
			<td>{{ $word->id }}</td>
			<td>{{ $word->word }}</td>
			<td>
				<a class="btn btn-primary" href="{{route('admin.word.edit', ['id'=> $word->id])}}">
					<i class="bi-pencil"></i>
				</a>
			</td>
			<td>
				<form action="{{ route('admin.word.delete', $word->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger">
						<i class="bi-trash"></i>
					</button>
				</form>
			</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
@endsection