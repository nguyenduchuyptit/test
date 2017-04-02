@extends('layouts.index')
@section('title')
	{{ "Cart" }}
@endsection
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="javascript:void(0)">Home</a></li>
				  <li class="active">My Order</li>
				</ol>
			</div>
			<div style="margin-bottom: 40px;">
				<h2>Order Status</h2>
				@if (session('success'))
					<div class="text-success">
						<h3 class="text-center">
							{{ session('success') }}
						</h3>
					</div>
				@endif
			</div>
			<div class="table-responsive cart_info">

				<table class="table table-condensed" style="margin-bottom: 0;">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 15%;">Item</td>
							<td class="description"></td>
							<td class="description" style="width: 20%">Mã hàng</td>
							<td class="price text-center" style="width: 20%">Status</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($bought as $cus)

						<tr>
							<td class="cart_product" style="margin: 10px 0px 10px 20px;">
								<a href="myorder/view-{{ $cus->id }}.html"><img width="100px" src="upload/product/{{ $cus->product->hinh }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="myorder/view-{{ $cus->id }}.html" >{{ $cus->product->ten }}</a></h4>
								<p>Web ID: {{ $cus->product->id }}</p>
							</td>
							<td>
								<p>Đặt hàng: #{{ $cus->id }}</p>
								<p>Đặt ngày: {{ date_format($cus->created_at,'d/m/Y') }}</p>
							</td>
							<td class="cart_price text-center">
								<a href="myorder/view-{{ $cus->id }}.html">Quản lý đơn hàng</a>
							</td>
						</tr>

					@endforeach
					</tbody>
				</table>
			</div>
			{{-- <div class="col-md-4">
				<h4>Địa chỉ</h4>
				<p>{{ $infor->address }}</p>
			</div>
			<div class="col-md-4">
				<h4>Địa chỉ giao hàng</h4>
				<p>{{ $infor->message }}</p>
			</div>
			<div class="col-md-4">
				<h4>Tổng tiền: </h4>
				<p>Tạm tính</p>
				<p>Phí vận chuyển: Free</p>
				<p>Voucher: No</p>
				<hr>
				<h4>Tổng (đã bao gồm VAT) : <span style="float: right;color: #FE980F;">{{ number_format($sum,2,'.',',') }} $</span></h4>
			</div> --}}
		</div>
</section> <!--/#cart_items-->

@endsection

