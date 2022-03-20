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

				<a href={{route('define.search', ["term"=>$def["word"], "exact"=>"1"]) }} class="btn bg-primary text-black"><b>{{ $def["word"] }}</b></a>
				
				<br>

				<p class="text-black">{{ $def["definition"] }}</p>

				<p><i>"{{ $def["example"] }}"</i></p>
				
				

				<hr>
				<a href={{route('define.search', ["owner"=>$def->user->id])}}><b>{{$def->user?->name?:"<null>"}}</b></a>
				| <i>{{ Carbon\Carbon::parse($def->created_at)->format('d M Y') }}</i>


				<br><br>
				<div>
					<button >+</button>
					(0)
					<button >-</button>
					(0)
				</div>
				

			</div>

			@if($def->user == Auth::user())
			   <div class="card-body text-center">	
					<a href="{{ route('define.edit', $def->id) }}" >Guncelle</a>
					
					<form action="{{ route('define.delete', $def->id)}}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" >Sil</button>
					</form>

			   </div>
			@endif

		</div>
	</div>
	@endforeach

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {!! $viewData["definitions"]->appends(

    	$viewData["owner_id"]==null
    	?["term" => $viewData["search-term"], "exact" => $viewData["is_exact"]!=1?null:1]
    	:["owner" => $viewData["owner_id"]]


    )->links() !!}
</div>

</div>

	@if($viewData["definitions"]->count()==0)
		'{{$viewData["search-term"]}}' kelimesi icin hic bir sonuc bulunamadi! Bir tane olusturmaya ne dersin?
		<br>
		<a href="{{route('define.add', ["word"=>$viewData["search-term"]] ) }}"] )}}" class="btn bg-primary text-white">Olustur</a>
	@endif


</div>
@endsection
