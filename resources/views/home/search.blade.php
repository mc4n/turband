@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
<div class="row">
 

	@foreach ($viewData["definitions"] as $def)
		<div class="col-md-4 col-lg-3 mb-2">
		<div class="card">

		<div class="card-body text-center">
		<a href="" class="btn bg-primary text-black">{{ $def["word"] }}</a>
		<br>
		<p class="text-black">{{ $def["definition"] }}</p>

		<i class="">"{{ $def["example"] }}"</i>
		<br>
		<br>
			<div>
				<button >+</button>
				<b>(0)</b>
				<button >-</button>
				<b>(0)</b>
			</div>
<br>
		by <a href="">admin</a>
		[01.01.2001]
		</div>

		</div>
		</div>
	@endforeach


</div>

	@empty($viewData["definitions"])
		'{{$viewData["search-term"]}}' kelimesi icin hic bir sonuc bulunamadi! Bir tane olusturmaya ne dersin?
		<br>
		<a href="/add?word={{$viewData["search-term"]}}" class="btn bg-primary text-white">Olustur</a>

	@endempty
</div>
@endsection
