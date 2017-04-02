@extends('layouts.index')
@section('title')
	{{ "Cart" }}
@endsection
@section('content')
<form method="post" action="">
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if ($count >0)
				<h2 style="color:#FBAA3F">You have {{ $count }} products</h2>
			@else
				<h2 style="color:#FBAA3F">Your Cart Empty</h2>
			@endif
			<div class="table-responsive cart_info">
				<table class="table table-condensed" style="margin-bottom: 0;">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 15%;">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity" style="width: 15%;">Quantity</td>
							<td class="total" width="10%">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					
					@foreach ($content as $item)
					
						<tr>
							<td class="cart_product" style="margin: 10px 0px 10px 20px;">
								<a href=""><img width="100px" src="upload/product/{{ $item->options->img }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $item->name }}</a></h4>
								<p>Web ID: {{ $item->id }}</p>
							</td>
							<td class="cart_price">
								<p>${{ number_format($item->price,0,",",".") }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_down button" href="javascript:void(0)"> - </a>
									<input class="cart_quantity_input getid" id="{{ $item->rowId }}" type="text" name="quantity" value="{{ ($item->qty) }}" autocomplete="off" size="2" min="0">
									<a class="cart_quantity_up button" href="javascript:void(0)"> + </a>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{ number_format($item->price*$item->qty)}}</p>
							</td>
							<td class="cart_delete" style="overflow: none;">
								<a class="cart_quantity_delete" href="{{ url('delete/'.$item->rowId) }}.html"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					
					@endforeach
					
					</tbody>
				</table>
			</div>
				
		</div>
		{{-- delete --}}
		@if ($count >0)
		<div class="container">
			<a style="float:right;margin-top: 0" onclick="return confirm('Bạn chắc muốn xóa hết chứ?')" type="submit" href="{{ url('delete-cart.html') }}" class="btn btn-primary">Delete All</a>
		</div>
		@endif
		{{-- end delete --}}
</section> <!--/#cart_items-->
		
<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>VietNam</option>
									<option>US</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Ha Noi</option>
									<option>Ho Chi Minh</option>
									<option>Dong Thap</option>
									<option>Quang Tri</option>
									<option>Ha Tinh</option>
									<option>Ca Mau</option>
									<option>Vung Tau</option>
									<option>Nha Trang</option>
									<option>Da Lat</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="{{ url('checkout.html') }}">Continue</a>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="total_area">
						<ul>
							
							<li>VAT(0%)<span>${{ 0 }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{ ($subtotal) }}</span></li>
						</ul>
							
							<a class="btn btn-default update" id="update" href="javascript:void(0)">Update</a>
							<a class="btn btn-default check_out" href="{{ url('checkout.html') }}">Check Out</a>
							
					</div>
				</div>
			</div>
		</div>
</section><!--/#do_action-->
</form>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){

			$(".button").each(function() {
				$(this).click(function(event) {
					var button=$(this).text();
					var quantity=$(this).parent().find("input[name='quantity']").val();
					//alert(quantity);
					if(button==" + "){
						var newVal= parseInt(quantity) +1;
						//max sản phẩm là 99
						if(newVal >=99){
							newVal=99;
						}
					}
					else{
						
						if(quantity > 1)
						{
							var newVal= parseInt(quantity)-1;
						}
						//ko cho nó xuống âm
						else{
							newVal=1;
						}
					}
					$(this).parent().find("input[name='quantity']").val(newVal);
				});
			});

			
			$('#update').click(function(){
				var data = [];
				var token = $("input[name='_token']").val();
				$('.getid').each(function(){
					var getId = $(this).attr('id');
					var qty = $(this).val();
					data.push({
						'getId': getId,
						'qty': qty
					});
				});
				// console.log(data) //kiểm tra xem giá trị truyền vào là 1 object thì đúng
				$.ajax({
					url: 'update',
					method:'post',
					data:{
						"_token": token,
						"data": data
					},
					success:function(data){
						if(data=="ok")
							window.location ="cart.html"
					}
				});
			});
		});
	</script>
	
@endsection
