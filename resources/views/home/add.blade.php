@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<form class="form-inline my-2 my-lg-0" action="{{ route('define.add_post') }}" method="post">

  @csrf

  <div class="row">

  Kelime: 
  <input type="text" name="word" class="form-control input-lg" value ="{{$viewData["word"]}}">

  Tanim: 
  <textarea name="definition" class="form-control input-lg"></textarea>

  Ornek Kullanim: 
  <textarea type="text" name="example" class="form-control input-lg"></textarea>

  <button class="btn btn-success" type="submit">Ekle</button>
 </div>

</form>

@endsection