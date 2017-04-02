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
						<h2 class="title text-center">View Detail Order</h2>
						<section id="cart_items">
							<div class="table-responsive cart_info">
								<table class="table table-condensed" style="margin-bottom: 0;">
									<thead>
										<tr class="cart_menu text-center">
											<td class="image" style="width: 15%;">Item</td>
											<td class="description" >Mô tả</td>
											<td class="description" style="width: 15%">Số lượng</td>
											<td class="description" style="width: 15%">Total</td>
											<td class="price text-center" style="width: 10%">Status</td>
										</tr>
									</thead>
									<tbody class="text-center">
										<td><a href="product-detail/{{ $CustomOrder->product->tenkodau }}-{{ $CustomOrder->product->id }}.html"><img style="width: 130px;" src="upload/product/{{ $CustomOrder->product->hinh }}"></a></td>
										<td class="cart_description">
											<a href="product-detail/{{ $CustomOrder->product->tenkodau }}-{{ $CustomOrder->product->id }}.html"><p style="font-size: 20px;">{{ $CustomOrder->product->ten }}</p></a>
											<p>{{ $CustomOrder->product->tomtat }}</p>
											</td>
										<td class="cart_description" style="font-size: 18px;">x{{ $CustomOrder->qty }}</td>
										<td class="cart_price" style="font-size: 18px;">{{ $CustomOrder->total }}$</td>
										<td class="cart_delete text-center" style="font-size: 18px; display: inline;"> 
											<p>
												@if($CustomOrder->customer->status ==0) 
													{{ "Đang gửi" }}
													<p><a class="cart_quantity_delete" href="myorder/delete-{{ $CustomOrder->id }}.html"><i class="fa fa-times"></i></a></p>
												@else
													<p style="margin-top:25px;">{{ "Đã giao" }}</p>
												@endif
											</p>
											
										</td>
									</tbody>
								</table>
							</div>
					</section> 
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection
