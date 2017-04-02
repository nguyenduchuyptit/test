@extends('layouts.index')
@section('title')
	{{ "Checkout" }}
@endsection
@section('content')
<section id="cart_items">
		
		<div class="container">
			
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			
				@if ($errors)
					@foreach ($errors->all() as $err)
					<div class="alert-danger" style="line-height: 40px; border-radius: 10px; font-size: 16px; padding-left: 15px;">
						{{ $err }}
					</div>
					@endforeach
				@endif

				@if (session('thongbao'))
					<div class="alert-danger" style="line-height: 40px; border-radius: 10px; font-size: 16px; padding-left: 15px;">
						{{ session('thongbao') }}
					</div>
				@endif

				@if (session('success'))
					<div class="alert-success" style="line-height: 40px; border-radius: 10px; font-size: 16px; padding-left: 15px;">
						{{ "Mua hàng thành công. Xin đợi liên hệ của chúng tôi" }}
					</div>
				@endif
			</div><!--/breadcrums-->
			
		@if(Auth::User())
			@if(count($content)>0)
			<div class="step-one">
				<h2 class="heading">Step1<small>&nbsp;Checkout Options</small></h2>
			</div>
			{{-- <div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options--> --}}

			{{-- <div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req--> --}}
			<form method="post" action="checkout.html">
				<div class="shopper-informations">
					<div class="row">
						<div class="col-sm-3 col-md-3">
							<div class="shopper-info">
								<p>Shopper Information</p>
								<div class="form-repair">
									<input type="text" placeholder="Display Name *" 
									value="@if(old('Name')) {{ old('Name') }}
									@else {{ Auth::User()->name }} @endif" required name="Name">
									<input type="text" placeholder="User Name *" value="{{ Auth::User()->email }}" readonly>
									<input type="password" name="Password" placeholder="Password *" required="">
									<input type="password" name="PasswordAgain" placeholder="Confirm password *" required="">
								</div>
								
							</div>
						</div>
						<div class="col-sm-5 col-md-5 clearfix">
							<div class="bill-to">
								<p>Bill To</p>
								<div class="form-one">
									<div class="form-repair">
										<input type="text" placeholder="Company Name" name="Company" value="{{ old('Company') }}">
										<input type="text" placeholder="Title" name="Title" value="{{ old('Title') }}"> 
										<input type="text" placeholder="Address *" name="Address" required="" value="{{ old('Address') }}">
										<input type="text" placeholder="Mobile Phone *" name="Phone" required="" value="{{ old('Phone') }}">
									</div>
								</div>
								<div class="form-two">
									<div class="form-repair">
										<input type="text" placeholder="Zip / Postal Code">
										<select>
											<option>-- Province/City --</option>
											<option>Hà Nội</option>
											<option>Hồ Chí Minh</option>
											<option>Cà Mau</option>
											<option>Vũng Tàu</option>
											<option>Nha Trang</option>
											<option>Đà Lạt</option>
											<option>Hà Tây</option>
											<option>Vĩnh Phúc</option>
										</select>
										<select>
											<option>-- Region --</option>
											<option>United States</option>
											<option>Bangladesh</option>
											<option>UK</option>
											<option>India</option>
											<option>Pakistan</option>
											<option>Ucrane</option>
											<option>Canada</option>
											<option>Dubai</option>
										</select>
										<input type="text" placeholder="Phone">
										<input type="text" placeholder="Fax">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="order-message">
								<p>Shipping Order</p>
								<textarea name="message" placeholder="Vui lòng nhập địa chỉ chi tiết để chúng tôi có thể gửi hàng đến nơi chính xác nhất" rows="16" required>{{ old('message') }}</textarea>
								<label><input type="checkbox"> Shipping to bill address</label>
							</div>	
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button class="btn btn-primary" type="submit" style="float:right" onclick="return window.confirm('Bạn đồng ý mua hàng chứ?')">Checkout</button>
					</div>
				</div>
			

			{{-- payment --}}
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 15%;">Item</td>
							<td class="description" width="35%"></td>
							<td class="price">Price</td>
							<td class="quantity" style="width: 15%;">Quantity</td>
							<td class="total" width="10%">Total</td>
							<td style="width: 10%;"></td>
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
									<a class="cart_quantity_down cursor" href="javascript:void(0)"> - </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ ($item->qty) }}" autocomplete="off" size="2" min="0">
									<a class="cart_quantity_up cursor" href="javascript:void(0)"> + </a>
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

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Exo Tax(0%)</td>
										<td>$0</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{ $subtotal }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
			</div>

		</form>
			@else
				<h2 class="text-center text-uppercase " style="margin-bottom: 40px;">Please <a style="color: #FE980F; font-weight: bold;" title="Eshop - Checkout" href="{{ url('product.html') }}"/>Giỏ hàng</a> của bạn chưa có sản phẩm</h2>
			@endif
		@else
			<h2 class="text-center text-uppercase " style="margin-bottom: 40px;">Please <a style="color: #FE980F; font-weight: bold;" title="Eshop - Checkout" href="{{ url('login.html') }}"/>Login</a> to continue</h2>
		@endif
		</div>
		
			
		
	</section> <!--/#cart_items-->
@endsection