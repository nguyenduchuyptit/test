	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			@foreach ($category as $cate)
							{{-- expr --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{ $cate->id }}">
							<span class="badge pull-right">
								@if(count($cate->subCategory)>0)
								<i class="fa fa-plus"></i>
								@endif
							</span>{{ $cate->ten }}
							</a>
						</h4>
					</div>
					@if(count($cate->subCategory)>0)
					<div id="sportswear{{ $cate->id }}" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								@foreach($cate->subCategory as $sub)
												<li><a href="category/{{ $sub->tenkodau }}-{{ $sub->id }}.html">{{ $sub->ten }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					@endif
				</div>
			@endforeach

						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach ($brand as $bra)
									<li>
										<a href="brand/{{ $bra->tenkodau }}-{{ $bra->id }}.html"><span class="pull-right">
											@if(count($bra->product)>0) {{ "(".count($bra->product).")" }} 
											@endif</span>{{ $bra->ten }}
										</a>
									</li>
								@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
							<form id="formSlider" type="post" action="product.html">
								<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[0,60]" id="sl2" name="aName"><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
								 {{-- <b>Min/Max</b><span id="output"></span> --}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
							</form>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							
							<a href="{{ $slideads->link }}"><img src="upload/slide_ads/{{ $slideads->hinh }}" alt="{{ $slideads->ten }}" /></a>
							
						</div><!--/shipping-->				
	</div>
