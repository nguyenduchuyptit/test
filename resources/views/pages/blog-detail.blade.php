@extends('layouts.index')
@section('title')
	{{ "Blog-Detail" }}
@endsection
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					@include('layouts.left-sidebar')
				</div>
				<div class="col-sm-9 col-md-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{ $blog->tieude }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i>{{ $blog->user->name }}</li>
									<li><i class="fa fa-clock-o"></i>{{ date_format($blog->created_at,'H:i') }}</li>
									<li><i class="fa fa-calendar"></i>{{ date_format($blog->created_at,'d:m:Y') }}</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<div style="font-weight: bold; font-size: 16px; ">
								{!! $blog->tomtat !!}
							</div><br>

							<p>
								<img class="img-responsive" src="upload/blog/{{ $blog->hinh }}" alt="{{ $blog->tieudekodau }}">
							</p><br>
							
							<p>
								{!! $blog->noidung !!}
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									@if (isset($prev))
										<li><a href="blog-detail/{{ $blogprev->tieudekodau }}-{{ $blogprev->id }}.html">Pre</a></li>
									@endif

									@if (isset($next))
										<li><a href="blog-detail/{{ $blognext->tieudekodau }}-{{ $blognext->id }}.html">Next</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<span><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div></span>
						<span style="margin:5px!important"><div style="margin-top:15px;" class="g-plusone" data-annotation="inline" data-width="120"></div></span>
					</div><!--/socials-share-->

					
					<div class="response-area">
						@if (count($comment)!=0)
							<h2>{{ count($comment) }} Comment</h2>
						@else
							<h2>Chưa có comment nào!</h2>
						@endif
						
						<ul class="media-list">
							@foreach ($comment as $com)
							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/user.png" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>{{ $com->user->name }}</li>
										<li><i class="fa fa-clock-o"></i>{{ date_format($com->created_at,'H:i') }}</li>
										<li><i class="fa fa-calendar"></i>{{ date_format($com->created_at,'d:m:Y') }}</li>
									</ul>
									<p>{!! $com->noidung !!}</p>
								</div>
							</li>
							@endforeach
							{{-- <li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> --}}
						</ul>					
					</div><!--/Response-area-->
					@if (Auth::User())
					
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<h2>Leave a reply</h2>
								<form>
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name..." value="{{ Auth::User()->name }}" readonly>
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" readonly placeholder="your email address..." value={{ Auth::User()->email }}>
								</form>
							</div>
							<div class="col-sm-8 col-md-8">
								<form method="post">
									<div class="text-area">
										<div class="blank-arrow">
											<label>Comment</label>
										</div>
										<span>*</span>
										<textarea name="noidung" id="noidung" rows="11" required></textarea>
										<input type="hidden" name="idBlog" value={{ $blog->id }}>
										<button type="submit" class="btn btn-primary" id="check" >
										Post Comment</button>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</div>
								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->
					@else
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<h2><a href="login.html">Login</a> to write comment</h2>
							</div>
						</div>
					</div><!--/Repaly Box-->
					@endif
				</div>	
			</div>
		</div>
	</section>
@endsection
