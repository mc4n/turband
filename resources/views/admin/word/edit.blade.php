@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
<div class="card-header">
Edit Definition
</div>
<div class="card-body">
@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif
	<form method="POST" action="{{ route('admin.word.update', ['id'=> $viewData['word']->id]) }}"
		enctype="multipart/form-data">
		@csrf
		@method('PUT')


			<div class="mb-3 row">
			<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Word:</label>
			<div class="col-lg-10 col-md-6 col-sm-12">
			<input name="word" value="{{ $viewData['word']->word }}" type="text" class="form-control">
			</div>
			</div>

			<div class="mb-3">
			<label class="form-label">Definition:</label>
			<textarea class="form-control" name="definition"
			rows="3">{{ $viewData["word"]->definition}}</textarea>
			</div>

			<div class="mb-3">
			<label class="form-label">Example:</label>
			<textarea class="form-control" name="example"
			rows="3">{{ $viewData["word"]->example}}</textarea>
			</div>

		<button type="submit" class="btn btn-primary">Edit</button>
	</form>
</div>
</div>
@endsection
