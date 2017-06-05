<h3>User : <b><i>
<?php $user=DB::table('users')->where('name',Auth::user()->name)->get(); ?>
	@foreach($user as $user)
		@if(is_numeric($user->name))
			{{$user->name_social}}
		@endif
		@if(!is_numeric($user->name))
			{{$user->name}}
		@endif
	@endforeach
</i></b>{{ $action}}</h3>
<b>Tittle: </b><i>{!!htmlspecialchars_decode($tittle)!!}</i><br>
Click here to view detail :<a href="{{$link}}">VIEW SOURCE</a><br><br>
Link: {{$link}}<br><br>