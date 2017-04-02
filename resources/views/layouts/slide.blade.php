	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@php
								$stt=0;
							@endphp
							@foreach ($slide as $sl)
							<li data-target="#slider-carousel" data-slide-to="{{ $stt }}"
							 
							@if ($stt==0)

							 class="active"

							@endif	
							></li>
							@php 
								$stt++;
							@endphp
							@endforeach
						</ol>
						
						<div class="carousel-inner">
							@php
								$stt=0;
							@endphp
							@foreach ($slide as $sl)
							
							<div class="item 
								@if ($stt==0)
									active
								@endif
							">
								<div class="col-sm-6 col-md-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>{{ $sl->ten }}</h2>
									<p>{!! $sl->noidung !!}</p>
									<a href="{{ $sl->link }}" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6 col-md-6">
									<img src="upload/slide/{{ $sl->hinh }}" class="girl img-responsive" alt="" />
									{{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
								</div>
							</div>
							@php 
								$stt++;
							@endphp
							@endforeach
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->