	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 972 605 171</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> dinhdu2704@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a target="_blank" href="https://www.facebook.com/kaideptrai102"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/kaideptrai1102"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="https://www.tumblr.com/blog/kai2704"><i class="fa fa-tumblr"></i></a></li>
								<li><a target="_blank" href="https://www.instagram.com/__kai.deptrai/"><i class="fa fa-instagram"></i></a></li>
								<li><a target="_blank" href="https://plus.google.com/u/0/103272603228499896219"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VN
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VN</a></li>
									<li><a href="#">US</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VND</a></li>
									<li><a href="#">Dollar</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8 col-md-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{ url('cart.html') }}"><i class="fa fa-shopping-cart"></i> Cart @if (Cart::content())
									({{ count(Cart::content()) }}) @endif</a></li>
								@if(Auth::User())
								<li><a href="javascript:void(0)" data-toggle="dropdown" ><i class="fa fa-user"></i>{{ Auth::User()->name }}</a>
									<ul class="dropdown-menu">
										<li><a style="line-height: 20px" href="{{ url('profile.html') }}">My Setting</a></li>
										<li><a style="line-height: 20px;padding-bottom: 5px;" href="{{ url('myorder.html') }}">My Order</a></li>
									</ul>
								</li>
								<li><a href="{{ url('logout.html') }}"><i class="fa fa-sign-out"></i>Log out</a></li> 
								@else
								<li><a href="{{ url('login.html') }}"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9 col-md-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('product.html') }}">Products</a></li>
										<li><a href="{{ url('checkout.html') }}">Checkout</a></li> 
										<li><a href="{{ url('cart.html') }}">Cart</a></li> 
										@if(Auth::User())
										<li><a href="{{ url('profile.html') }}">Profile</a></li> 
										<li><a href="{{ url('logout.html') }}">Log out</a></li> 
										@else
										<li><a href="{{ url('login.html') }}">Login</a></li> 
										@endif
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('blog.html') }}">Blog List</a></li>
                                    </ul>
                                </li> 
								<li><a href="#">404</a></li>
								<li><a href="{{ url('contact.html') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-md-3">
					<form method="post" action="search">
						<div class="search_box pull-right">
							<input type="text" name="search" placeholder="Search" value="{{ old('search') }}" required role="search"/>
							<a href=""><i class="fa fa-search"></i></a>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
