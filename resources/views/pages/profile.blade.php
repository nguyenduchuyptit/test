@extends('layouts.index')
@section('title')
	{{ "Profile" }}
@endsection
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				@if(count($errors)>0)
				<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3" >
					@foreach ($errors->all() as $err)
						<div class="alert-danger text-center bor-radius">
							<h3 class="line60">{{ $err }}</h3>
						</div>
					@endforeach
				</div>
				@endif
				@if (session('thongbao'))
				<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
					<div class="alert-success text-center bor-radius">
						<h3 class="line60">{{ session('thongbao') }}</h3>
					</div>
				</div>
				@endif
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<div class="login-form"><!--profile form-->
						<h2>Login to your account</h2>
						<form action="profile.html" method="post">
							<input type="text"  name="Ten" placeholder="Name"  value="{{ Auth::User()->name }}" />
							<input type="email" name="Email" placeholder="Email Address" disabled value="{{ Auth::User()->email }}" />
							<span>
								<label>
								<input type="checkbox" class="checkbox" name="changePass" id="changePass"> 
								Change your password
								</label>
							</span>
							<input type="password" class="change" placeholder="Password" name="Password" disabled />
							<input type="password" class="change" placeholder="Password Again" name="PasswordAgain" disabled />
							<button type="submit" class="btn btn-default">Submit</button>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
					</div><!--/profile-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#changePass').change(function(){
				if($(this).is(':checked')){
					$('.change').removeAttr('disabled');
					$('.change').css({"background":'white','border':'1px solid burlywood'});
				}
				else{
					$('.change').attr('disabled', 'disabled');
					$('.change').css({"background":'#F0F0E9','border':'medium none'})
				}
			})
		});
	</script>
@endsection