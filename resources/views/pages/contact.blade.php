@extends('layouts.index')
@section('title')
	{{ "Contact" }}
@endsection
@section('content')
	<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row" style="margin-bottom: 50px;">    		
	    		<div class="col-sm-12 col-md-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2> 
						<div class="table-responsive">
							<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1tvcFDXz2XqAckK_UBIB7Vs8VewU" width="100%" height="600px"></iframe>
						</div>   			 
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8 col-md-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Contact With Us</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('contact.html') }}">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required   placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required  placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				            <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4 col-md-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>69 Cầu Giấy, near Hanoi University of Industry</p>
							<p>Ha Noi, Vietnam</p>
							<p>Mobile: +84 972 605 171</p>
							<p>Email: dinhdu2704@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
@endsection
