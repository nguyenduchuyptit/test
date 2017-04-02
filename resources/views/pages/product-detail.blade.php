@extends('layouts.index')
@section('title')
	{{ "Product-Detail" }}
@endsection
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					@include('layouts.left-sidebar')
				</div>
				
				<div class="col-sm-9 col-md-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5 col-md-5">
							<div class="view-product" id="load-img">
								<img id="zoom_mw" src="upload/product/{{ $procheck->hinh }}" alt="" data-zoom-image="upload/product/{{ $procheck->hinh }}" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<style type="text/css">.width25{width: 25%;}</style>
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh }}" alt=""></a>
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh2 }}" alt=""></a>
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh3 }}" alt=""></a>
										</div>
										<div class="item">
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh2 }}"  alt=""></a>
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh3 }}" alt=""></a>
											<a href="javascript:void(0)"><img class="width25 a-click" src="upload/product/{{ $procheck->hinh }}" alt=""></a>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7 col-md-7">
							<div class="product-information"><!--/product-information-->
								@if ($procheck->noibat==1)
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								@endif
								@if($procheck->noibat==0 && $procheck->soluong < 50)
								<img src="images/product-details/sale.jpg" class="newarrival">
								@endif
								<h2>{{ $procheck->ten }}</h2>
								<p>Web ID: {{ $procheck->id }}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{ url('buy-product/'.$procheck->tenkodau.'-'.$procheck->id.'.html') }}" method="post">
								<span>
									<span>USD: {{ $procheck->gia }}$</span>
									<label>Quantity:</label>
									<input type="number" min="0" max="99" value="1" name="number"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</span>
								</form>
								<p><b>Availability: </b>
									@if($procheck->soluong >10)
										{{ "Còn hàng" }}
									@else {{ "Hết hàng" }}
									@endif 
								</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand: </b>{{ $procheck->brand->ten }}</p>
								<div class=" col-sm-12">
									<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
									<div class="g-plusone" data-annotation="inline" data-width="120"></div>
										
								</div>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12 col-md-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Products</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Price</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews @if (count($comment)>0) {{ "(".count($comment).")" }} @endif</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								@if(count($proSub)==0)
									<h1>Chưa có sản phẩm</h1>
								@endif
								@foreach ($proSub as $prs)
							
								<div class="col-sm-3 col-md-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="upload/product/{{ $prs->hinh }}" alt="" />
												<h2>${{ $prs->gia }}</h2>
												<p>{{ $prs->ten }}</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								@if(count($proPrice)==0)
									<h1>Chưa có sản phẩm</h1>
								@endif
								@foreach ($proPrice as $pr)
								
								<div class="col-sm-3 col-md-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="upload/product/{{ $pr->hinh }}" alt="" />
												<h2>${{ $pr->gia }}</h2>
												<p>{{ $pr->ten }}</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								
								@endforeach
							</div>
							
							<div class="tab-pane fade" id="tag" >
								@if(count($proBrand)==0)
									<h1>Chưa có sản phẩm</h1>
								@endif
								@foreach ($proBrand as $br)
								<div class="col-sm-3 col-md-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="upload/product/{{ $br->hinh }}" alt="" />
												<h2>${{ $br->gia }}</h2>
												<p>{{ $br->ten }}</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12 col-md-12">
									@foreach ($comment as $com)
									<ul >
										<li><a href=""><i class="fa fa-user"></i>{{ $com->user->name }}</a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i>{{ date_format($com->created_at,'H:i') }}</a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-calendar-o"></i>{{ date_format($com->created_at,'d:m:Y') }}</a></li>
									</ul>
									<div style="margin-bottom: 30px; margin-top: -10px;">{!! $com->noidung !!}</div>
									<hr>
									@endforeach
									<p style="margin-top:60px;"><b >Write Your Review</b></p>
									@if(Auth::User())
										<form action="" method="post">
											<span>
												<input style="color:brown" type="text" value="{{ Auth::User()->name }}"  readonly />
												<input style="color:brown" value="{{ Auth::User()->email }}"  type="email" readonly />
											</span>
											<textarea style="color:brown" name="review" required></textarea>
											<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
											<button type="submit" class="btn btn-default pull-right">
												Submit
											</button>
											<input type="hidden" name="idPro" value={{ $procheck->id }}>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
										</form>		
									@else
										<div class="text-uppercase" style="margin-top:50px;">
											<h1 style="color: #FE980F;">Login to write Reviews</h1>
										</div>
									@endif 
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->

					<!--recommended_items-->
					@include('layouts.recommended-item')
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
@endsection
@section('script')
	<script src='js/jquery.elevatezoom.js'></script>
	{{-- <script type="text/javascript">
        $(document).ready(
            function(){
                $("#remove").elevateZoom({scrollZoom : true});
            }
        );
	</script> --}}
    <script type="text/javascript">
        $(document).ready(function(){
        	var width = $( document ).width();
        	if(width <= 750)
        	{
        		$('#load-img img').removeAttr('id');
        	}
            $(".a-click").click(function()
            {
                var Images = $(this).attr('src');
                $("#load-img > img").remove();
                $('#load-img').append('<img src="'+Images+'" id=zoom_mw >');
               	//$.get('load-img/'+Images,function(data){
                //    $('#load-img').html(data);
                //});
                $('#zoom_mw').elevateZoom({scrollZoom : true});
            });
            $('#zoom_mw').elevateZoom({scrollZoom : true});
        });
    </script>
    
@endsection