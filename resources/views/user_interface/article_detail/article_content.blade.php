@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">

			    <div class="row">
					@foreach($detail_article as $data)
					<?php $user = DB::table('users')->where('id', $data->user_id)->get();?>

					<h3 class="modal_header col-centered" align="center" align="center" style="margin-bottom: 50px;">{{$data->type}}</h3>

			        <div class="col-sm-8 blog-main">

			            <div class="blog-post">
				            <h2 class="blog-post-title">{{$data->tittle}}</h2>
				            <p class="blog-post-meta">Created <i>{{$data->created_at->format('H:i:s d-m-Y')}}</i> by 
				            	<b>
				            		@foreach($user as $user)
										{{$user->name}}
									@endforeach
								</b>
				            </p>

				            <p>{!!htmlspecialchars_decode($data->introduce)!!}</p>
				            <p>{!!htmlspecialchars_decode($data->content)!!}</p>
			            </div><!-- /.blog-post -->
			        </div><!-- /.blog-main -->

			        <div class="col-sm-3 offset-sm-1 blog-sidebar">
			            <div class="sidebar-module sidebar-module-inset">
				            <h3 align="center"><b>Related articles</b></h3>
			            </div>
			            <?php $no=0;?>
			            @foreach($relate_article as $relate)
			            <?php $no++; ?>
			            @if($no<=6)
				            <div class="sidebar-module">
					            <ol class="list-unstyled">
					              <li><a href="#">{{$relate->tittle}}</a></li>
					            </ol>
				            </div>
			            @endif
			            @endforeach
			        </div><!-- /.blog-sidebar -->
			    </div><!-- /.row -->
				@endforeach
				<footer class="blog-footer">
				    <div class="{{(isset(Auth::user()->name) ? 'hidden' : '')}}">
						Login to comment:<br>
						<a data-toggle="modal" data-target="#login">Login <span class="glyphicon glyphicon-log-in"></span></a>
					</div>
				</footer>

				<a href="{{URL::previous()}}"><button class="btn_user warning">Back</button></a>
			</div>
		</div>
	</div>

@stop