				<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								@php
									$stt=0;
								@endphp
						@foreach ($category as $cate2)

							@if(count($cate2->product)>0)
								@if(count($cate2->product->where('noibat',1))!=0)
								<div class="item @if($stt==0) active @endif ">

									@foreach ($cate2->product->where('noibat',1)->take(3) as $pro2)
										
										<div class="col-sm-4 col-md-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="upload/product/{{ $pro2->hinh }}" alt="" />
														<h2>${{ $pro2->gia }}</h2>
														<p>{{ $pro2->ten }}</p>
														<a href="buy/{{ $pro2->tenkodau }}-{{ $pro2->id }}.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
													
												</div>
											</div>
										</div>

									@endforeach

									@php
									$stt++;
									@endphp
									
								</div>
								@endif
							@endif
								
						@endforeach

							</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>			
						</div>
					</div><!--/recommended_items-->