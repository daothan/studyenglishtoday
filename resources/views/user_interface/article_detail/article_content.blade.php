@extends('user_interface.layouts.user_header')
@section('content')

	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits" style="background-color: rgb(240, 241, 243);">

			    <div class="row" style="margin-top: 70px;">
					@foreach($detail_article as $data)
					<?php $user = DB::table('users')->where('id', $data->user_id)->get();
						foreach($user as $user){
							$user_name_comment = $user->name;
						}
					?>

					<h3 class="modal_header col-centered" align="center" align="center" style="margin-bottom: 50px;">
						{{($data->type=="writing") ? 'Knowlegde Library' : 'Reading Practice'}}
					</h3>

			        <div class="col-sm-8 blog-main overflow" style="background-color: rgb(255, 255, 255);">

			            <div class="blog-post">
				            <!-- Like Share -->
							<p><i class="text-success">Like and Share Website</i></p>
							<div class="facebook_button">
								<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div>
							<div class="facebook_button1">
								<div class="fb-like" data-href="http://studyenglishtoday.org/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
							</div><br>
							<!-- End Like Share -->
				            <h2 style="font-weight: 400;"><p style="color: rgba(15, 17, 115, 0.69);">{{$data->tittle}}</p></h2>
				            <p class="blog-post-meta">Created <i class="{{(isset(Auth::user()->name) && Auth::user()->level<2) ? '':'hidden'}}">{{$data->created_at->format('H:i:s d-m-Y')}}</i><i class="{{(isset(Auth::user()->name) && Auth::user()->level==2) ? '':'hidden'}}">{{$data->created_at->format('d-m-Y')}}</i><i class="{{(isset(Auth::user()->name)) ? 'hidden':''}}">{{$data->created_at->format('d-m-Y')}}</i>
				            </p>

				            <span><i>{!!htmlspecialchars_decode($data->introduce)!!}</i></span>
				            <div class="reading_content">
				            	<span style="word-wrap: break-word">{!!htmlspecialchars_decode($data->content)!!}</span>
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
							    <form role="form" action="{{route('comment',[$data->id,$data->tittle,$data->type])}}">
							        <div class="form-group">
							        	<input type="text" name="current_url_comment" id="current_url_comment" value="{{url()->current()}}" class="hidden">
							            <textarea class="comment_form" id="comment_form" name="comment_form"></textarea>
										<script type="text/javascript">ckeditor("comment_form", "config", "comment")</script>
							        </div>
							        <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
							    </form>
							</div>
							<div class="well {{(isset(Auth::user()->name) ? 'hidden' : '')}}">
								<p align="center" style="font-size: 16px;">Login to comment:<br>
								<a data-toggle="modal" data-target="#login" style="font-size: 16px;">Login <span class="glyphicon glyphicon-log-in"></span></a></p>
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
				            <div class="total_page col-md-3">
								Comments: {{$comment_count}}
							</div>

							<div class="col-md-6 ">
								<ul class="pagination pagination_comment {{$comment_info->lastPage() == 0 ? 'hidden' : ''}}">
				                    <li class="{{($comment_info->currentPage()==1) ? 'hidden':''}}">
				                    	<a href="{{$comment_info->url($comment_info->currentPage()-1)}}"><span>«</span></a>
				                    </li>
				                    <li class="{{($comment_info->currentPage()==1)?'hidden':''}}">
				                    	<a href="{{$comment_info->url(1)}}"><span>1</span></a>
				                    </li>
									<li class="{{($comment_info->currentPage()<=2)?'hidden':''}}">
										<span>...</span>
									</li>
									@for($i=1; $i<=$comment_info->lastPage(); $i++)
										<li class="{{($comment_info->currentPage()==$i)? 'active':'hidden'}}">
											<a href="{{$comment_info->url($i)}}" ><span>{{$i}}</span></a>
										</li>
									@endfor
									<li class="{{($comment_info->currentPage()>=$comment_info->lastPage()-1)?'hidden' : ''}}">
										<span>...</span>
									</li>
									<li class="{{($comment_info->currentPage()>=$comment_info->lastPage())?'hidden':''}}">
										<a href="{{$comment_info->url($comment_info->lastPage())}}"><span>{{$comment_info->lastPage()}}</span></a>
									</li>
									<li class="{{($comment_info->currentPage()==$comment_info->lastPage())?'hidden' : ''}}">
										<a href="{{$comment_info->url($comment_info->currentPage()+1)}}"><span>»</span></a>
									</li>
			       				</ul>
							</div>
				        </div>
						<!-- Comment -->

			        </div><!-- /.blog-main -->

			        <div class="col-sm-4 offset-sm-1 blog-sidebar">
			            <div class="sidebar-module sidebar-module-inset">
				            <h3 align="center"><b>Related articles</b></h3>
			            </div><hr>
			            <?php $no=0;?>
			            @foreach($relate_article as $relate)
			            <?php $no++; ?>
			            @if($no<=6)
				            <div class="">
				              	<li class="li_relate">
									<div class="media-block horizontal width-img size-4">
										<a href="{{route('detail_article',[$relate->type,$relate->alias])}}" class="img-wrap" title="{{$relate->tittle}}">
											<img class="relate_image" src="/studyenglishtoday/{{$relate->image_path}}">
										</a>
										<div class="content_relate">
											<a href="{{route('detail_article',[$relate->type,$relate->alias])}}">
												<h4 style="    font-weight: 400;"><span class="title">{{$relate->tittle}}</span></h4>
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