@extends('layouts.app')


@section('title', '| Project Detail')


@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
	<div class="overly">
		<ul>
			<li> <a href="{{ route('index') }}"> Home </a> / </li>
			<li> <a href="{{ route('projects') }}"> Projects </a> / </li>
			<li> <a href="" class="active"> {{ $project -> name }} </a> </li>
		</ul>
	</div>
</div>

<!--main banner-->


<div class="container-fluid all-pages">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="prject-large wow fadeInLeft">
					<a href="{{ asset('public/uploads/images/projects/'. $project -> main_image) }}" data-fancybox="large-img"><img src="{{ asset('public/uploads/images/projects/'. $project -> main_image) }}" class="img-fluid" alt=""></a>
   					{{-- <div class="sub-images">
   						<ul class="owl-carousel slider3 owl-theme">
   							<li class="item"> <a href="images/project-img.jpg"  data-fancybox="large-img" data-grid="a"> <img src="images/project-img.jpg" alt=""> </a> </li>
   							<li class="item"> <a href="images/project-large.jpg"  data-fancybox="large-img" data-grid="b"><img src="images/project-large.jpg" alt=""></a> </li>
   							<li class="item"> <a href="images/02.jpg" data-fancybox="large-img" data-grid="c"><img src="images/02.jpg" alt=""></a> </li>
   							<li class="item"> <a href="images/service1.jpg" data-fancybox="large-img" data-grid="d"><img src="images/service1.jpg" alt=""></a> </li>
   						</ul>
   					</div> --}}
   				</div>
   			</div>
   			<div class="col-lg-6 col-md-6">
   				<div class="project-details wow fadeInRight">
   					<div class="scroll1">
   						<h4>{{ $project -> name }}</h4>
   						{!! $project -> detail !!}

   					</div>
   					<ul class="tsr-btns">
   						<li> <a href="{{ url() -> previous() }}"> Back </a> </li>
   						<li> <a href="{{ route('inquiry') }}"> inquiry now </a> </li>
   					</ul>
   				</div>
   			</div>
   		</div>
   		

   		@if(count($relatedProjects) > 0)
   		<div class="row">
   			<div class="col-lg-12 col-md-12">
   				<div class="heading">
   					<h4>Related Projects</h4>
   					<img src="images/02.png" alt="">
   				</div>
   			</div>
   			<div class="col-lg-12 col-md-12">
   				<div class="owl-carousel slider1 owl-theme">
					

					<?php $delay = 10; ?>
   					@foreach($relatedProjects as $r_project)

   					<div class="item wow fadeInLeft" data-wow-delay="0.{{ $delay }}s">
   						<div class="projects">
   							<div class="img">
   								<img src="{{ asset('public/uploads/images/projects/'. $r_project -> main_image ) }}" class="img-fluid" alt="">
   							</div>
   							<div class="detail">
   								<h4>{{ $r_project -> name }}</h4>
   								{!! strlen($r_project -> detail) > 80 ? substr($r_project -> detail, 0, 80).'...' : $r_project -> detail !!}
   								<ul>
   									<li> <a href="{{ route('project.large', $r_project -> id) }}"> more info </a> </li>
   									<li> <a href="{{ route('inquiry') }}"> inquiry now </a> </li>
   								</ul>
   							</div>
   						</div>
   					</div>
   					<?php 
   						$delay += 10; 
   					?>

   					@endforeach



						{{-- <div class="item wow fadeInLeft" data-wow-delay="0.10s">
							<div class="projects">
								<div class="img">
									<img src="images/p1.jpg" class="img-fluid" alt="">
								</div>
								<div class="detail">
									<h4>Motel Al Shariea</h4>
									<p>
										Consultant	: Baynona <br>
										Main Contractor	: AL Habtoor <br> 
										Capacity	: 10000 Ton cooling
									</p>
									<ul>
										<li> <a href=""> more info </a> </li>
										<li> <a href="inquiry.php"> inquiry now </a> </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="item wow fadeInLeft" data-wow-delay="0.20s">
							<div class="projects">
								<div class="img">
									<img src="images/p1.jpg" class="img-fluid" alt="">
								</div>
								<div class="detail">
									<h4>Motel Al Shariea</h4>
									<p>
										Consultant	: Baynona <br>
										Main Contractor	: AL Habtoor <br> 
										Capacity	: 10000 Ton cooling
									</p>
									<ul>
										<li> <a href=""> more info </a> </li>
										<li> <a href="inquiry.php"> inquiry now </a> </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="item wow fadeInLeft" data-wow-delay="0.30s">
							<div class="projects">
								<div class="img">
									<img src="images/p1.jpg" class="img-fluid" alt="">
								</div>
								<div class="detail">
									<h4>Motel Al Shariea</h4>
									<p>
										Consultant	: Baynona <br>
										Main Contractor	: AL Habtoor <br> 
										Capacity	: 10000 Ton cooling
									</p>
									<ul>
										<li> <a href=""> more info </a> </li>
										<li> <a href="inquiry.php"> inquiry now </a> </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="item wow fadeInLeft" data-wow-delay="0.40s">
							<div class="projects">
								<div class="img">
									<img src="images/p1.jpg" class="img-fluid" alt="">
								</div>
								<div class="detail">
									<h4>Motel Al Shariea</h4>
									<p>
										Consultant	: Baynona <br>
										Main Contractor	: AL Habtoor <br> 
										Capacity	: 10000 Ton cooling
									</p>
									<ul>
										<li> <a href=""> more info </a> </li>
										<li> <a href="inquiry.php"> inquiry now </a> </li>
									</ul>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
			@endif



		</div>
	</div>

	@endsection