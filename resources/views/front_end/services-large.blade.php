@extends('layouts.app')

@section('title', '| Service Detail')

@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
        <li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li> <a href="{{ route('services') }}"> services </a> / </li>
				<li> <a href="" class="active"> {{ $service -> name }} </a> </li>
			</ul>
    	</div>
    </div>
    
    <!--main banner-->

   <div class="container-fluid all-pages movmen">
   	<div class="container">   		
   		<div class="row">
   			<div class="col-lg-6 col-md-6 movee wow fadeInLeft">
   				<div class="servies-detail">
   				<h4> {{ $service -> name }} </h4>
   					<div class="scroll1" style="height: 360px;">
            
            {!! $service -> detail !!}

          </div>
   				</div>
   				<div class="services-btn">
   					<ul>
   						<li> <a href="{{ route('inquiry') }}"> Inquiry Now </a> </li>
   						<li> <a href="{{ url()->previous() }}"> Back </a> </li>
   					</ul>
   				</div>
   			</div>

   			<div class="col-lg-6 col-md-6 wow fadeInRight">
   				<div class="services-imgs">
   					<div class="owl-carousel slider4 owl-theme">

   						<div class="item">
   							<img src="{{ asset('public/uploads/images/services/'. $service -> main_image ) }}" class="img-fluid" alt="">
   						</div>

   						{{-- <div class="item">
   							<img src="images/03.jpg" class="img-fluid" alt="">
   						</div>
   						<div class="item">
   							<img src="images/03.jpg" class="img-fluid" alt="">
   						</div> --}}

   					</div>
   				</div>
   			</div>

   		</div>   		
   	</div>
   </div>
   
@endsection