@extends('layouts.index')
@section('title')
	{{ "Products" }}
@endsection
@section('content')
	@include('layouts.ads')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					@include('layouts.left-sidebar')
				</div>
				
				<div class="col-sm-9 col-md-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div id="load-ajax">
							@foreach ($product as $prod)
							
							<div class="col-sm-4 col-md-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="upload/product/{{ $prod->hinh }}" alt="" />
											<h2>${{ $prod->gia }}</h2>
											<p>{{ $prod->ten }}</p>
											<a href="product-detail/{{ $prod->tenkodau }}-{{ $prod->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>${{ $prod->gia }}</h2>
												<p>{{ $prod->ten }}</p>
												<a href="product-detail/{{ $prod->tenkodau }}-{{ $prod->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Detail</a>
													<br>
												<a href="buy/{{ $prod->tenkodau }}-{{ $prod->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>

											@if ($prod->noibat==1 && $prod->soluong > 50)
													<img src="images/home/new.png" class="new" alt="" />
											@endif
											@if($prod->soluong <=50 && $prod->noibat==0)
													<img src="images/home/sale.png" class="new" alt="" />
											@endif
											
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							@endforeach
						</div>
						<div class="col-sm-12 col-md-12 text-center">
							{!! $product->appends(['search'=>$search])->fragment('html')->links() !!}
						</div>

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection
{{-- @section('script')
	<script type="text/javascript">
		$(document).ready(function(){

			$("#sl2").slider({})
				.on('slide', function(event, ui) {
			    	// $('#output').html(this.value);
			    	var price_range= this.value;
			    	var token = $("input[name='_token']").val();
			    	var something="something";
			    	$.ajax({
						url: 'product.html',
						method:'post',
						data:{
							"_token": token,
							"price_range": price_range
						},
						success:function(data){
							$("#load-ajax").html(data);
						}
					});
				}).trigger('slide');


			// $("#gui").click(function() {
			// 	var something="something";
				
				
			// });
			
		});
	</script>
@endsection --}}