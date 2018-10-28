@extends('layouts.app')

@section('title', '| News & Events')


@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
				<li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li> <a href="" class="active"> News &amp; Events </a> </li>
			</ul>
    	</div>
    </div>
    
    <!--main banner-->
   
   <div class="container-fluid all-pages news-and-events">
   	<div class="container">  		

         <?php
            $delay = 0;
          ?>
         @foreach($news as $event) 
         
   		<div class="row wow fadeInUp" data-wow-delay="0.{{ $delay }}s">
   			<div class="col-lg-9 col-md-9">
   				<div class="content">
   					<h5>{{ date('d M, Y', strtotime($event -> created_at)) }}</h5>
   					<h4>{{ $event -> heading }}</h4>
                  {!! $event -> detail !!}
   				</div>
   			</div>
   			<div class="col-lg-3 col-md-3">
   				<div class="img">
   					<img src="{{ asset('public/uploads/images/news/'. $event -> image) }}" class="img-fluid" alt="">
   				</div>
   			</div>
   		</div>
         
         <?php
            $delay = $delay + 10;
          ?>

         @endforeach
   		
   		{{-- <div class="row wow fadeInUp" data-wow-delay="0.10s">
   			<div class="col-lg-9 col-md-9">
   				<div class="content">
   					<h5>09-22-2018</h5>
   					<h4>News Heading</h4>
   					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
   				</div>
   			</div>
   			<div class="col-lg-3 col-md-3">
   				<div class="img">
   					<img src="images/news.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   		</div>
   		
   		<div class="row wow fadeInUp" data-wow-delay="0.20s">
   			<div class="col-lg-9 col-md-9">
   				<div class="content">
   					<h5>09-22-2018</h5>
   					<h4>News Heading</h4>
   					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
   				</div>
   			</div>
   			<div class="col-lg-3 col-md-3">
   				<div class="img">
   					<img src="images/news.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   		</div>
   		
   		<div class="row wow fadeInUp" data-wow-delay="0.20s">
   			<div class="col-lg-9 col-md-9">
   				<div class="content">
   					<h5>09-22-2018</h5>
   					<h4>News Heading</h4>
   					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
   				</div>
   			</div>
   			<div class="col-lg-3 col-md-3">
   				<div class="img">
   					<img src="images/news.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   		</div>
   		
   		<div class="row wow fadeInUp" data-wow-delay="0.30s">
   			<div class="col-lg-9 col-md-9">
   				<div class="content">
   					<h5>09-22-2018</h5>
   					<h4>News Heading</h4>
   					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
   				</div>
   			</div>
   			<div class="col-lg-3 col-md-3">
   				<div class="img">
   					<img src="images/news.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   		</div> --}}
   		
   	</div>
   </div>
   
   
@endsection