@extends('layouts.app')

@section('title', '| Contact Us')



@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
				<li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li> <a href="" class="active"> Contact Us </a> </li>
			</ul>
    	</div>
    </div>
    
    <!--main banner-->

  
  <!--short about-->
   
   
   
   <!--short about-->
   
   <div class="container-fluid all-pages contact-us">
   	<div class="container">
   		<div class="row">

            @foreach($offices as $office)

   			<div class="col-lg-4 col-md-4">
   				<div class="address wow fadeInRight">
   					<h4>{{ $office -> name }}</h4>
                  {!! $office -> detail !!}
   					{{-- <ul>
   						<li> <span> Tel: </span>  02 666 0244 </li>
   						<li> <span> Fax: </span>  02 665 0264 </li>
   						<li> <span> Email: </span>  <a href="">mail@elmacsco.ae</a> </li>
   						<li>
   							Electro-Mechanical Air Conditioning Systems <br>
							Khalidiya Street, Rak Bank Building, 2nd Floor, <br>
							P.O.Box 2252 Abu Dhabi UAE.
   						</li>
   					</ul> --}}
   				</div>
   			</div>
   			<div class="col-lg-8 col-md-8">
   				<div class="location-map">
   					<iframe src="{{ $office -> map_link }}" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
   				</div>
   			</div>
   			<hr>

            @endforeach


   			{{-- <div class="col-lg-4 col-md-4">
   				<div class="address wow fadeIn" data-wow-delay="0.10s">
   					<h4>Dubai Office</h4>
   					<ul>
   						<li> <span> Tel: </span>  04-4210041 </li>
   						<li> <span> Fax: </span>  04-4212046 </li>
   						<li> <span> Email: </span>  <a href="">mail@elmacsco.ae</a> </li>
   						<li>
   							3903,CITADEL TOWER, <br>
							Business Bay, P.O.BOX. 413573, <br>
							Dubai-UAE.
   						</li>
   					</ul>
   				</div>
   			</div>
   			<div class="col-lg-8 col-md-8">
   				<div class="location-map">
   					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14525.276073702014!2d54.347943!3d24.474401000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d320e73d1c30416!2sElmacs+Co+LLC!5e0!3m2!1sen!2sae!4v1539412840993" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
   				</div>
   			</div> --}}

   			<hr>


            <!--feedback form -->
   			<div class="col-lg-12 col-md-12">
   				<div class="row wow fadeInLeft" data-wow-delay="0.20s">
   					<div class="col-lg-12 col-md-12">
   						<div class="address">
   							<h4>Feedback Form</h4>
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="address">
   							<input type="text" placeholder="Name">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="address">
   							<input type="text" placeholder="Email">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="address">
   							<input type="text" placeholder="Phone">
   						</div>
   					</div>
   					<div class="col-lg-12 col-md-12">
   						<div class="address">
   							<textarea placeholder="Subject"></textarea>
   						</div>
   					</div>
   					<div class="col-lg-6 col-md-6">
   						<div class="address">
   							<button> Submit </button>
   						</div>
   					</div>
   					<div class="col-lg-6 col-md-6">
   						<div class="address">
   							<img src="images/captcha.jpg" alt="">
   						</div>
   					</div>
   					
   				</div>
   			</div>
   			
   			
   			
   		</div>
   	</div>
   </div>
   
@endsection