<h3>Name posted comment : <b><i>
<?php $user=DB::table('users')->where('name',Auth::user()->name)->get(); ?>
	@foreach($user as $user)
		@if(is_numeric($user->name))
			{{$user->name_social}}
		@endif
		@if(!is_numeric($user->name))
			{{$user->name}}
		@endif
	@endforeach
</i></b></h3>
<b>Comment: </b><i>{!!htmlspecialchars_decode($messages)!!}</i><br>
Click here to view detail :<a href="{{$link}}">VIEW SOURCE</a><br><br>
Link: {{$link}}<br><br>