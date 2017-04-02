@extends('layouts.index')
@section('title')
	{{ "Category" }}
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
						@if (count($product3)==0)
							<h1 class="text-warning text-center">Sản phẩm hiện chưa có</h1>
							<h3 class="text-center">Ấn vào <a href="javascript:history.back()">đây</a> để quay lại</h3>
						@endif
						<div id="load-category">
							@foreach ($product3 as $prod)
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
						@if(count($product3)>0)
							@foreach ($product3->take(1) as $prod)
								<input type="hidden" name="idSubCate" value="{{ $prod->subcate->id }}">
							@endforeach
						@endif
						<div class="col-sm-12 col-md-12 text-center">
							{{ $product3->render() }}
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection
@section('script')
	<script type="text/javascript">
	$(document).ready(function() {
		$("#sl2").slider()
			.on('slideStop', function(event, ui) {
			var price_range=this.value;
			var token= $("input[name='_token']").val();
			var idSubCate= $("input[name='idSubCate']").val();
			$.ajax({
				url:'category.html',
				method:'post',
				data: {
					"price_range":price_range,
					"_token":token,
					"idSubCate":idSubCate
				},
				success:function(data){
					//load
					$("#load-category").html(data);
				}
			});
		});
	});
	</script>
@endsection