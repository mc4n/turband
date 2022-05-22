@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')


<div>

	<i style="color:grey;">
			'{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('j F, Y') }}'
			tarihinde katılındı.
	</i>

	@if (Auth::user()->email_verified_at==null)
	<i style="color:red">(email doğrulanmadı)</i>
	<a class="btn bg-secondary text-white" href='/email/verify'>Dogrula</a>

	@else
		<i style="color:green">(email doğrulandı)</i>
	@endif

	<div>
		<h1> 
			{{Auth::user()->name?:Auth::user()->nickname }}
		</h1>

		<h6>
			{{Auth::user()->email}}
		</h6>

	</div>


	<hr>

	<div>
		<a href='{{route('define.search', ['owner'=> Auth::user()->nickname])}}'>
			Tanımların ({{Auth::user()->wordDefinitions->count()}})
		</a>

		<br>

		<a href='{{route('home.votes')}}'>
			Oyladıkların ({{Auth::user()->votes->count()}})
		</a>

	</div>

	<hr>

	<a class="btn bg-primary text-white" href='/password/reset'>Şifre sıfırla</a>
	


</div>




@endsection

