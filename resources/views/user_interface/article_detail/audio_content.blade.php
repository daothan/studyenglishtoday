@extends('user_interface.layouts.user_header')
@section('content')
	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">

			    <div class="row">
					@foreach($detail_audio as $data)
					<?php $user = DB::table('users')->where('id', $data->user_id)->get();
						foreach($user as $user){
							$user_name_comment = $user->name;
						}
					?>

					<h3 class="modal_header col-centered" align="center" align="center" style="margin-bottom: 50px;">Listening Practice</h3>

			        <div class="col-sm-8 blog-main">

			            <div class="blog-post overflow">
				            <!-- Like Share -->
							<p><i class="text-success">Like and Share Website</i></p>
							<div class="facebook_button">
								<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div>
							<div class="facebook_button1">
								<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div><br>
							<!-- End Like Share -->
				            <h2 class="blog-post-title"><a>{{$data->tittle}}</a></h2>
				            <p class="blog-post-meta">Created <i class="{{(isset(Auth::user()->name) && Auth::user()->level<2) ? '':'hidden'}}">{{$data->created_at->format('H:i:s d-m-Y')}}</i><i class="{{(isset(Auth::user()->name) && Auth::user()->level==2) ? '':'hidden'}}">{{$data->created_at->format('d-m-Y')}}</i><i class="{{(isset(Auth::user()->name)) ? 'hidden':''}}">{{$data->created_at->format('d-m-Y')}}</i>
				            </p>
				            <p>{!!htmlspecialchars_decode($data->introduce)!!}</p>
				            <div class="">
								<audio preload="auto" controls>
								    <source id="mp3Source" type="audio/mp3" src="{{'/laravel1/'.$data->audio_path}}"/>
								    <source id="oggSource" type="audio/ogg" src="{{'/laravel1/'.$data->audio_path}}" />
									<source id="oggSource" type="audio/wav" src="{{'/laravel1/'.$data->audio_path}}">
								</audio>
				            </div>
				            <div class="hint">
				            	<span align="center">
				            		<i>Tab key or <span class="glyphicon glyphicon-play"></span></i>&nbsp&nbsp: Play / Pause <br>
				            		<i>Left key or <span class="glyphicon glyphicon-backward"></span></i>&nbsp &nbsp: backward 4 seconds <br>
				            		<i>Right key or <span class="glyphicon glyphicon-forward"></span></i> : forward 4 seconds
				            	</span>
				            </div>

							<p align="center">
								<button class="btn_user info collapsed" data-toggle="collapse" data-target="#dictation"  style="margin-top: 30px; width: 180px;"><h4>Take dictation here...</h4></button>
							</p>
							<?php
                                $str = $data->dictation;
                                $arr =  explode(" ", $str);
                                $total = str_word_count($str);
                            ?>
							<h4 align="center" class="text-info">Total words: <?php echo $total; ?></h4>
							<div class="collapse" id="dictation">
								<div class="inputContainer" id="inputContainer">
			                        @foreach($arr as $arr)
			    		                  <div class="editable quick" name="{!!htmlspecialchars_decode($arr)!!}-{!!htmlspecialchars_decode($arr)!!}" id="editable1" p="false" placeholder="Please TYPE here" ></div>
			                        @endforeach
			                    </div>

			                    <!-- View score -->
			                    <button class="btn_user success collapsed" onclick="result_ditation()" data-toggle="collapse" data-target="#score" aria-expanded="false">Your score</button>
								<div class="collapse" id="score">
									<div class="panel-body">
										<p><b>Total words :</b> <i class="total-text"></i></p>
										<p><b>Correct     :</b> <i class="correct-text"></i></p>
										<p><b>Point       :</b> <i class="efficient"></i>%</p>
									</div>
								</div>
								<div class="total-word hidden"><?php echo $total; ?></div>
							</div>
		                    <!-- View score -->
							<p align="center">
								<button class="button collapsed" data-toggle="collapse" data-target="#transcript"  style="margin-top: 30px; width: 180px;">Transcript</button>
							</p>
							<div class="collapse" id="transcript" style="padding: 10px;">
								<p>
					            	{!!htmlspecialchars_decode($data->transcript)!!}
								</p>
							</div>
			            </div><!-- /.blog-post -->
			            <!-- Comment -->
						<hr>
				        <div class="comment">
				        <!-- Show Form Add Comments-->
							<div class="well {{(isset(Auth::user()->name)? '':'hidden')}}">
							    <h4><i class="fa fa-paper-plane-o"></i> Leave a Comment:</h4>
							    @if(session('error'))
									<p style="color:red;"><b><i>{{session('error')}}</i></b></p>
							    @endif
							    @if(session('success'))
									<p style="color:green;"><b><i>{{session('success')}}</i></b></p>
							    @endif
							    <form role="form" action="{{route('comment',[$data->id,$data->tittle,"audio"])}}">
							        <div class="form-group">
							       		<input type="text" name="current_url_comment" id="current_url_comment" value="{{url()->current()}}" class="hidden">
							            <textarea class="comment_form" id="comment_form" name="comment_form"></textarea>
										<script type="text/javascript">ckeditor("comment_form", "config", "comment")</script>
							        </div>
							        <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
							    </form>
							</div>
							<div class="well {{(isset(Auth::user()->name) ? 'hidden' : '')}}">
								<p align="center"><b>Login to comment:</b><br>
								<a data-toggle="modal" data-target="#login">Login <span class="glyphicon glyphicon-log-in"></span></a></p>
							</div>
							<!-- Show Comments-->
							@if(session('success_comment'))
								<p style="color:green;"><b><i>{{session('success_comment')}}</i></b></p>
						    @endif
							@foreach($comment_info as $comment)
							<!-- Delete-->
							<div class="delete_comment_admin {{((isset(Auth::user()->name) && (Auth::user()->level < 2 || Auth::user()->name == $comment->user_comment)) ? '':'hidden')}}">
				           	 	<a href="{{route('delete_comment',$comment->id)}}"><button type="button" class="btn_user danger">Delete</button></a>
							</div>
							<!-- Delete-->
				            <div class="panel panel-white post panel-shadow">
				                <div class="post-heading">
				                    <div class="pull-left meta">
				                        <div class="title h5">
				                            <a><b>
												<?php $user=DB::table('users')->where('name',$comment["user_comment"])->get(); ?>
												@foreach($user as $user)
													@if(is_numeric($user->name))
														{{$user->name_social}}
													@endif
													@if(!is_numeric($user->name))
														{{$user->name}}
													@endif
												@endforeach
				                            </b></a>
				                        </div>
				                        <h6 class="text-muted time">Commented at <i>{{$data->created_at->format('H:i:s d-m-Y')}}</i></h6>
				                    </div>
				                </div>
				                <div class="post-description">
				                    <p>{!!htmlspecialchars_decode($comment->comment)!!}</p>
				                </div>
				            </div>
				            @endforeach
				            Total Pages: {!! $comment_info->lastPage() !!}
							<div class="pagination pull-right {{($comment_info->lastPage()==0) ? 'hidden':''}}">
								<a href="{{$comment_info->url(1)}}" class="{{($comment_info->currentPage()==1) ? 'hidden':''}}">&laquo;</a>
								<a href="{{$comment_info->url($comment_info->currentPage()-1)}}" class="{{($comment_info->currentPage()==1) ? 'hidden':''}}">Prev</a>
								@for($i=1; $i<=$comment_info->lastPage(); $i++)
									<a href="{{$comment_info->url($i)}}" class="{{($comment_info->currentPage()==$i)? 'active':''}}">{{$i}}</a>
								@endfor
								<a href="{{$comment_info->url($comment_info->currentPage()+1)}}" class="{{($comment_info->currentPage()==$comment_info->lastPage())?'hidden' : ''}}">Next</a>
								<a href="{{$comment_info->url($comment_info->lastPage())}}" class="{{($comment_info->currentPage()==$comment_info->lastPage())?'hidden' : ''}}">&raquo;</a>
							</div>
				        </div>
			        </div><!-- /.blog-main -->

			        <div class="col-sm-4 offset-sm-1 blog-sidebar">
			            <div class="sidebar-module sidebar-module-inset">
				            <h3 align="center"><b>Related articles</b></h3>
			            </div><hr>
			            <?php $no=0;?>
			            @foreach($relate_audio as $relate)
			            <?php $no++; ?>
			            @if($no<=6)
				            <div class="">
				              	<li class="li_relate">
									<div class="media-block horizontal width-img size-4">
										<a href="{{route('tittle_audio',[tittle($relate->tittle)])}}" class="img-wrap" title="{{$relate->tittle}}">
											<img class="relate_image" src="/laravel1/{{$relate->image_path}}">
										</a>
										<div class="content_relate">
											<a href="{{route('tittle_audio',[tittle($relate->tittle)])}}">
												<h4><span class="title">{{$relate->tittle}}</span></h4>
											</a>
										</div>
									</div>
				              	</li><hr>
				            </div>
			            @endif
			            @endforeach
			        </div><!-- /.blog-sidebar -->
			    </div><!-- /.row -->
				@endforeach
				<a href="{{URL::previous()}}"><button class="btn_user warning" style="margin-top: 20px;">Back</button></a>
				<footer class="blog-footer" style="margin-top: 20px;">
				</footer>

			</div>
		</div>
	</div>

@stop