@extends('layouts.app')

@section('title', '| About Us')


@section('content')

    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
    			<li> <a href="{{ route('index') }}"> Home </a> / </li>
    			<li> <a href="" class="active"> About Us </a> </li>
    		</ul>
    	</div>
    </div>
    
    <!--main banner-->
   
   <div class="container-fluid all-pages about-us">
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-3 col-md-4">
   				<div class="left-menu wow fadeInLeft">
   					<ul>
              @foreach($abouts as $key => $about)

              @if ($about -> id == $about_first_tab -> id)
                <li class="active"> <a href="{{ route('about.tab', $about -> id) }}"> {{ $about -> tab_name }}  </a> </li>
              @else
                <li class=""> <a href="{{ route('about.tab', $about -> id) }}"> {{ $about -> tab_name }}  </a> </li>
              @endif
   						
   						@endforeach

              @if(count($teams) > 0)
   						<li> <a href="{{ route('ourteam') }}">  Our Team  </a> </li>
              @endif

              @if(count($certificates) > 0)
   						<li> <a href="{{ route('certificates') }}">  Our Certificates  </a> </li>
              @endif

   					</ul>
   				</div>
   			</div>
   			<div class="col-lg-9 col-md-8 wow fadeInRight">
   				
   				<div class="row">
   					<div class="col-lg-12 col-md-12">
   						<div class="content">

                {!! $about_first_tab -> tab_detail !!}
   							{{-- <p>
   								The guiding principle since ELMACS was established in 1973, has been the achievement of excellence through strict adherence to professional engineering standards and meticulous attention to detail. This tradition was set from the very beginning by ELMACS founder , Mr. Ali El-Yassir, and is a direct product of his academic, technical and managerial background: M.S. degree in Electrical Engineering from Princeton University, New Jersey.
   								<br>
   								<br>
								ELMACS  is a professionally managed electro- mechanical contracting organization, generally recognized by discerning consultants, contractors and customers, throughout the U.A.E., for quality work and outstanding performance. We are truly proud of this hard- earned reputation, and we are determined to continue to live up to our customers’ high expectations of us.
								<br>
								<br>
								The guiding principle since ELMACS was established in 1973, has been the achievement of excellence through strict adherence to professional engineering standards and meticulous attention to detail. This tradition was set from the very beginning by ELMACS founder , Mr. Ali El-Yassir, and is a direct product of his academic, technical and managerial background: M.S. degree in Electrical Engineering from Princeton University, New Jersey, USA;
								<br>
								<br>
								The tradition of engineering excellence and customer satisfaction is an unwritten law which will continue to govern all aspects of ELMACS work in the future. ELMACS  is a professionally managed electro- mechanical contracting organization, generally recognized by discerning consultants, contractors and customers, throughout the U.A.E., for quality work and outstanding performance. We are truly proud of this hard- earned reputation, and we are determined to continue to live up to our customers’ high expectations of us.

   							</p> --}}
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>

@endsection