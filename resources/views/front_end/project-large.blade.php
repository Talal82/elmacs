@extends('layouts.app')


@section('title', '| Project Detail')


@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
				<li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li> <a href="" class="active"> Our Projects </a> </li>
			</ul>
    	</div>
    </div>
    
    <!--main banner-->

  
  <!--short about-->
   
   
   
   <!--short about-->
   
   <div class="container-fluid all-pages">
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-6 col-md-6">
   				<div class="prject-large wow fadeInLeft">
   					<a href="images/project-img.jpg" data-fancybox="large-img"><img src="images/project-img.jpg" class="img-fluid" alt=""></a>
   					<div class="sub-images">
   						<ul class="owl-carousel slider3 owl-theme">
   							<li class="item"> <a href="images/project-img.jpg"  data-fancybox="large-img" data-grid="a"> <img src="images/project-img.jpg" alt=""> </a> </li>
   							<li class="item"> <a href="images/project-large.jpg"  data-fancybox="large-img" data-grid="b"><img src="images/project-large.jpg" alt=""></a> </li>
   							<li class="item"> <a href="images/02.jpg" data-fancybox="large-img" data-grid="c"><img src="images/02.jpg" alt=""></a> </li>
   							<li class="item"> <a href="images/service1.jpg" data-fancybox="large-img" data-grid="d"><img src="images/service1.jpg" alt=""></a> </li>
   						</ul>
   					</div>
   				</div>
   			</div>
   			<div class="col-lg-6 col-md-6">
   				<div class="project-details wow fadeInRight">
   					<div class="scroll1">
   						<h4>Vision Hotel Apartment</h4>
							<p>ELMACS is a professionally managed electro- mechanical contracting organization, generally recognized by discerning consultants, contractors and customers, throughout the U.A.E., for quality work and outstanding performance. We are truly proud of this hard- earned reputation, and we are determined to continue to live up to our customers’ high expectations of us.
							<br>
							<br>
							It has survived not only five centuries, but also the leap into electronic 
							typesetting, remaining essentially unchanged.
							<br>

						</p>
						<ul>
							<li> Consultant	: <span> Dar Al Khaleej</span> </li>
							<li> Main Contractor	: <span>Bin Harmal Cont</span> </li>
							<li> Complete	: <span>2012</span> </li>
							<li> Short Description: <span>MEP Work</span> </li>
						</ul>

   					</div>
  				<ul class="tsr-btns">
  					<li> <a href=""> Back </a> </li>
  					<li> <a href="inquiry.php"> inquiry now </a> </li>
  				</ul>
   				</div>
   			</div>
   		</div>
   		
   		<div class="row">
   		<div class="col-lg-12 col-md-12">
   			<div class="heading">
   				<h4>Related Projects</h4>
   				<img src="images/02.png" alt="">
   			</div>
   		</div>
   			<div class="col-lg-12 col-md-12">
   				<div class="owl-carousel slider1 owl-theme">
						<div class="item wow fadeIn">
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
						<div class="item wow fadeInLeft" data-wow-delay="0.10s">
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
						</div>
   				</div>
   			</div>
   			
   			
   		
   		</div>
   		
   	</div>
   </div>
   
@endsection