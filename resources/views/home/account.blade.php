@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')


<div>

	<div>
		<h1> 
			{{Auth::user()->name?:Auth::user()->nickname }}
		</h1>

		<h6>
			{{Auth::user()->email}}
		</h6>

		<!--<i style="color:grey;">
			'{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('j F, Y') }}'
			tarihinde katildi.
			({{Auth::user()->email_verified_at==null?"email dogrulanmadi":""}})
		</i>
		-->

	</div>


	<hr>

	<div>
		<a href='{{route('define.search', ['owner'=> Auth::user()->id])}}'>
			Tanimlarin ({{Auth::user()->word_definitions->count()}})
		</a>

		<br>

		<a href='{{route('home.votes')}}'>
			Oyladiklarin ({{Auth::user()->votes->count()}})
		</a>

	</div>

</div>




@endsection

