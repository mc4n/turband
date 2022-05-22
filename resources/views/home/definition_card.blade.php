<div class="card"  style="border: 2px solid #5F9EA0">

	<div class="card-body">	

		@if($def->likes_count - $def->dislikes_count >= 0)
			<h4><a href={{route('define.search', ["term"=>$def->word, "exact"=>"1"]) }}><b>{{ $def->word }}</b></a></h4>
			<p>{{ $def->definition }}</p>
			<p><i>"{{ $def->example }}"</i></p>
			
			@else
			<h4><a style='color:grey;' href={{route('define.search', ["term"=>$def->word, "exact"=>"1"]) }}>{{ $def->word }}</a></h4>
			<p style='color:grey;'>{{ $def->definition }}</p>
			<p style='color:grey;'><i>"{{ $def->example }}"</i></p>
		@endif

		<div class="card-block text-center">
		<a href={{route('define.search', ["owner"=>$def->user->nickname])}}><b>{{$def->user?->nickname?:"<null>"}}</b></a>
		
		<i>{{ Carbon\Carbon::parse($def->created_at)->format('d M Y') }}</i>

<hr>
		<div>

			<div style="float:left;">
				<form action="{{ route('define.vote', ['word_definition_id'=>$def->id, 'is_like'=>1])}}" method="POST">
				@csrf
				@method('PUT')
				<button style='background-color:{{$def->user_likes_count>0?"green":""}}' type="submit" >+</button>
				<label>({{$def->likes_count}})</label>
				</form>

			</div>

			<div style="float:left;">
				<form action="{{ route('define.vote', ['word_definition_id'=>$def->id, 'is_like'=>0])}}" method="POST">
				@csrf
				@method('PUT')
				<button style='background-color:{{$def->user_dislikes_count>0?"red":""}}' type="submit" >-</button>
				<label>({{$def->dislikes_count}})</label>
				</form>
			</div>

			<div style="float:right;">
				@if($def->likes_count - $def->dislikes_count > 0)
				<label style='color:white; background-color:green;'>{{'+'.$def->likes_count-$def->dislikes_count}}</label>
				@elseif($def->likes_count-$def->dislikes_count == 0)
					<label style='color:white; background-color:grey;'>{{'-'.$def->likes_count-$def->dislikes_count}}</label>
				@else
					<label style='color:white; background-color:red;'>{{$def->likes_count-$def->dislikes_count}}</label>

				@endif

			</div>


			
		</div>

		
		
		
		


		

	</div>

		

	</div>

	@if($def->user == Auth::user())
	   	<div class="card-footer text-center">	
			<a href="{{ route('define.edit', $def->id) }}" >Guncelle</a>
			
			<form action="{{ route('define.delete', $def->id)}}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" >Sil</button>
			</form>

	   	</div>
	@endif

</div>