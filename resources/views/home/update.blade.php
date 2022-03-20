@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

@if($errors->any())
<ul class="alert alert-danger list-unstyled">
@foreach($errors->all() as $error)
<li>- {{ $error }}</li>
@endforeach
</ul>
@endif

@auth
<form method="POST" class="form-inline my-2 my-lg-0" action={{ route('define.update', $viewData["word"]->id ) }}>

  @csrf
  @method('PUT')

  <div class="row">

  Kelime: 
  <input name="word" class="form-control input-lg" value='{{$viewData["word"]?->word}}'>

  Tanim: 
  <textarea name="definition" class="form-control input-lg">{{$viewData["word"]?->definition}}</textarea>

  Ornek Kullanim: 
  <textarea type="text" name="example" class="form-control input-lg">{{$viewData["word"]->example}}</textarea>

  <button class="btn btn-success" type="submit">Tamamla</button>
 </div>

</form>
  
 </div>


@endauth

@endsection