@extends('layouts.index')
@section('title')
	{{ "Logout" }}
@endsection
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="title">Đăng xuất thành công</h2>
					<li style="list-style: none" class="lino">Bạn sẽ chuyển về <a style="color: #FE980F;" href="home"/>trang chủ</a> sau <span id="time">10</span> giây<br/>
					Ấn vào <a style="color:#FE980F" href="{{ url('') }}" onclick="reload();" id="reloadlink" title="Nhấn vào đây để tải lại trang">đây</a> để về ngay
					</li>
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
@section('script')
<script type="text/javascript">
	var jgt = 10;
	function stime()
	{
		document.getElementById('time').innerHTML = jgt;    
		jgt = jgt - 1;
		if(jgt == 0)
		{
			clearInterval(timing); 
			location = 'home';
		}
	}
	var timing = setInterval("stime();",1000);
</script>
@endsection