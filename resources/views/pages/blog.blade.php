@extends('layouts.index')
@section('title')
	{{ "Blog" }}
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

						@foreach ($blog as $bl)

						<div class="single-blog-post">
							<h3>{{ $bl->tieude }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i>{{ $bl->user->name }}</li>
									<li><i class="fa fa-clock-o"></i>{{ date_format($bl->created_at,'H:i') }}</li>
									<li><i class="fa fa-calendar"></i>{{ date_format($bl->created_at,'d-m-Y') }}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="blog-detail/{{ $bl->tieudekodau }}-{{ $bl->id }}.html">
								<img src="upload/blog/{{ $bl->hinh }}" alt="{{ $bl->tieudekodau }}">
							</a>
							<p>{!! $bl->tomtat !!}</p>
							<a  class="btn btn-primary" href="blog-detail/{{ $bl->tieudekodau }}-{{ $bl->id }}.html">Read More</a>
						</div>

						@endforeach

						<div class="pagination-area">
							{{ $blog->render() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection