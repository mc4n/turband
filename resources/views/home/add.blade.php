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
@else 

 <div class="row">

  Kelime: 
  <input disabled="true" type="text" name="word"value ="{{$viewData["word"]}}">

  Tanim: 
  <textarea disabled="true"  name="definition"></textarea>

  Ornek Kullanim: 
  <textarea disabled="true" type="text" name="example"></textarea>

  <i> Tanim ekleyebilmek icin lutfen giris yapin.</i>
  
 </div>


@endauth

@endsection