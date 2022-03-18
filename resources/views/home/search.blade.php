@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["is_exact"] == 1? "'".$viewData["search-term"]."'"." kelimesi" : $viewData["subtitle"])

@section('content')
<div class="container">


<div class="row">

	@foreach ($viewData["definitions"] as $def)
	<div class="col-md-4 col-lg-3 mb-2">
		<div class="card">

		<div class="card-body text-center">
			<a href="{{route('define.search', ["term"=>$def["word"], "exact"=>"1"] ) }}"] )}}" class="btn bg-primary text-black">{{ $def["word"] }}</a>
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

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {!! $viewData["definitions"]->appends(["term" => $viewData["search-term"], "exact" => $viewData["is_exact"]!=1?null:1])->links() !!}
</div>

</div>

	@if($viewData["definitions"]->count()==0)
		'{{$viewData["search-term"]}}' kelimesi icin hic bir sonuc bulunamadi! Bir tane olusturmaya ne dersin?
		<br>
		<a href="{{route('define.add', ["word"=>$viewData["search-term"]] ) }}"] )}}" class="btn bg-primary text-white">Olustur</a>
	@endif


</div>
@endsection
