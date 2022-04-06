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

  @if(Auth::user()->email_verified_at!=null)
    <form class="form-inline my-2 my-lg-0" action="{{ route('define.add_post') }}" method="post">

      @csrf

      <div class="row">

      Kelime: 
      <input type="text" name="word" class="form-control input-lg" value ='{{$viewData["word"]?:old('word')}}'>

      Tanim: 
      <textarea name="definition" class="form-control input-lg">{{old('definition')}}</textarea>

      Ornek Kullanim: 
      <textarea type="text" name="example" class="form-control input-lg">{{old('example')}}</textarea>

      <button class="btn btn-success" type="submit">Tamamla</button>
     </div>

    </form>

    @else
      @php
        header("Location: " . URL::to('/email/verify'), true, 302);
        exit();
      @endphp

  @endif



@else 

 <div class="row">

  Kelime: 
  <input disabled="true" type="text" name="word"value ="{{$viewData["word"]}}">

  Tanim: 
  <textarea disabled="true"  name="definition"></textarea>

  Ornek Kullanim: 
  <textarea disabled="true" type="text" name="example"></textarea>

  <i> Tanim ekleyebilmek icin lutfen <a href='{{route('login')}}'>giris</a> yapin.</i>
  
 </div>


@endauth

@endsection