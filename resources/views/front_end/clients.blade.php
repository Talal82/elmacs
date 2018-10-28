@extends('layouts.app')

@section('title', '| Clients')


@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
				<li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li> <a href="" class="active"> Clients </a> </li>
			</ul>
    	</div>
    </div>

   
   <!--short about-->
   
   <div class="container-fluid all-pages about-us">
   	<div class="container">
   		
   		<div class="row">

        @foreach($clients as $client)

   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="">
            <a href="{{ $client -> link }}" target="_blank">
   					<img src="{{ asset('public/uploads/images/clients/'.$client -> image) }}" class="img-fluid" alt="Client Image">
            </a>
   				</div>
   			</div>

        @endforeach
   			{{-- <div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.10s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.20s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.30s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.40s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.50s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.60s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.70s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.80s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.85s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.90s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="0.95s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-2 col-md-2 col-sm-4 col-6">
   				<div class="logos wow bounceIn" data-wow-delay="1s">
   					<img src="images/l1.jpg" class="img-fluid" alt="">
   				</div>
   			</div> --}}

   		</div> <!-- row -->
   	</div>
   </div>
   
   
@endsection