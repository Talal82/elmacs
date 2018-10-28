
   
   <div class="container-fluid footer">
   	<div class="container">
         <!--if we have any client -->
         @if(count($clients) > 0)
   		<div class="row">
   			<div class="col-lg-12 col-md-12">
   				<div class="promo-logo">
   					<ul class="owl-carousel slider2 owl-theme">
                     @foreach($clients as $client)

   						<li class="item wow fadeInLeft" data-wow-delay="0.10s" data-wow-duration="0.5s"> <a href="{{ $client -> link }}" target="_blank"> <img src="{{ asset('public/uploads/images/clients/'. $client -> image) }}" alt="client image"> </a> </li>

                     @endforeach
   					</ul>
   				</div>
   			</div>
   		</div>
         @endif

   		<div class="row">
   			<div class="col-lg-4 col-md-4">
   				<div class="footer-text" style="padding-right: 40px;">
   					<img src="{{ asset('public/uploads/images/logos/'. $footer -> logo) }}" class="img-fluid" alt="Logo Image">
   					{!! $footer -> detail !!}
   				</div>
   			</div>
   			<div class="col-lg-4 col-md-4">
   				<div class="footer-text">
   					<h4>Quick Links</h4>
   					<ul>
   						<li> <a href="{{ route('index') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Home </a> </li>
   						<li> <a href="{{ route('news') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> News & Events </a> </li>
   						<li> <a href="{{ route('aboutus') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> About Us </a> </li>
   						<li> <a href="{{ route('clients') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Clients </a> </li>
   						<li> <a href="{{ route('services') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Our Services </a> </li>
   						<li> <a href="{{ route('inquiry') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Inquiry </a> </li>
   						<li> <a href="{{ route('projects') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Our Projects </a> </li>
   						<li> <a href="{{ route('career') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Careers </a> </li>
   						<li> <a href="{{ route('contactus') }}"> <i class="fa fa-angle-right" aria-hidden="true"></i> Contact </a> </li>
   					</ul>
   				</div>
   				{{-- <div class="fixed-social-icon">
					<ul>
						<li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>
						<li> <a href=""> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>
						<li> <a href=""> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>
						<li> <a href=""> <i class="fa fa-google-plus" aria-hidden="true"></i> </a> </li>
						<li> <a href=""> <i class="fa fa-youtube-play" aria-hidden="true"></i> </a> </li>
					</ul>
				</div> --}}
   			</div>
   			<div class="col-lg-4 col-md-4">
   				<div class="footer-text footer-contact">
   					<h4>{{ $footer -> contact_title }}</h4>
   					{!! $footer -> contact_detail !!}
   				</div>
   				<div class="footer-subscribe">
   					<input type="text" placeholder="Enter your email...">
   					<button><i class="fa fa-angle-right" aria-hidden="true"></i></button>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   
   <div class="container-fluid copyright">
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-6 col-md-6">
   				<div class="left">
   					<p>© Copyrights All Rights   ELMACS Electro-MeChanical & Air Conditioning Systems 2018 </p>
   				</div>
   			</div>
   			<div class="col-lg-6 col-md-6">
   				<div class="right">
   					<p>Design And Developed By:Tornado</p>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   
  
 




