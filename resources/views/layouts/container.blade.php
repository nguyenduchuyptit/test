@extends('layouts.index')
@section('title')
	{{ "Home" }}
@endsection
@section('content')

	@include('layouts.slide')
	@if (session('success'))
		{!! "<script>
			alert('Đăng ký thành công ^^');
		</script>" !!}
	@endif
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					{{-- left sidebar --}}
					@include('layouts.left-sidebar')
					{{-- end left sidebar --}}
				</div>
				
				<div class="col-sm-9 col-md-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($product as $pro)
						
						<div class="col-sm-4 col-md-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="upload/product/{{ $pro->hinh }}" alt="{{ $pro->tomtam }}"   />
											<h2>${{ $pro->gia }}</h2>
											<p>{{ $pro->ten }}</p>

											<a href="product-detail/{{ $pro->tenkodau }}-{{ $pro->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>${{ $pro->gia }}</h2>
												<p>{{ $pro->ten }}</p>
												<a href="product-detail/{{ $pro->tenkodau }}-{{ $pro->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Detail</a>
												<br>
												<a href="buy/{{ $pro->tenkodau }}-{{ $pro->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
											@if ($pro->soluong <=30)
												<img src="images/home/sale.png" class="new" alt="" />
											@endif
											@if ($pro->noibat==1)
												<img src="images/home/new.png" class="new" alt="" />
											@endif
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
		
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							@php
								$stt2=0;
							@endphp
							@foreach ($category as $cate)
								@if(count($cate->subCategory)>0)
								<li 
									@if($stt2==0) 
										class="active" 
									@endif
								>
									<a href="#{{ $cate->tenkodau }}" data-toggle="tab">{{ $cate->ten }}</a>
									@php
										$stt2++;
									@endphp
								</li>
								@endif
								
							@endforeach
							
							</ul>
						</div>
						<div class="tab-content">
						@php
							$stt3=0;
						@endphp
						@foreach ($category as $cate)
							@if (count($cate->subCategory) >0)
							<div class="tab-pane fade 
								@if($stt3==0) 
									active
								@endif 
								@php
									$stt3++;
								@endphp
									in" id="{{ $cate->tenkodau }}" >
								@foreach ($cate->product->take(4) as $pro)
								<div class="col-sm-3 col-md-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="upload/product/{{ $pro->hinh }}" alt="" />
												<h2>${{ $pro->gia }}</h2>
												<p>{{ $pro->ten }}</p>
												<a href="buy/{{ $pro->tenkodau }}-{{ $pro->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								@endforeach
							</div>
							@endif
						@endforeach	
						</div>
					</div><!--/category-tab-->
					
					@include('layouts.recommended-item')
					
				</div>
			</div>
		</div>
</section>
@endsection
