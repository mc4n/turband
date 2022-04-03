@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="container">

	<div class="row">

		{{-- List Items --}}
		@foreach ($viewData["definitions"] as $def)
		<div class="col-md-4 col-lg-3 mb-2">
			@include('home.definition_card', $def)
		</div>
		@endforeach

		{{-- Pagination --}}
		<div class="d-flex justify-content-center">
		    {!! $viewData["definitions"]->appends(

		    	$viewData["owner"] == null
		    	?["term" => $viewData["search-term"], "exact" => $viewData["is_exact"] !=1 ? null : 1]
		    	:["owner" => $viewData["owner"]->nickname]


		    )->links() !!}
		</div>


	</div>


	@if($viewData["definitions"]->count() == 0)
		@if($viewData["owner"] != null)
			Burada bir tanim yok!
		@else
			'{{$viewData["search-term"]}}' kelimesi icin hic bir sonuc bulunamadi! Bir tane olusturmaya ne dersin?
			<br>
			<a href="{{route('define.add', ["word"=>$viewData["search-term"]] ) }}"] )}}" class="btn bg-primary text-white">Olustur</a>
		@endif
	@endif


</div>
@endsection
