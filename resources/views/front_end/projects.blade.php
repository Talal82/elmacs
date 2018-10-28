@extends('layouts.app')

@section('title', '| Projects')



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
   			<div class="col-lg-3 col-md-4">
   				<div class="left-dropdown-menu wow fadeInLeft">
   					<div class="accordion" id="accordionExample">
					  <div class="card">
						<div class="card-header" id="headingOne">
						  <h5 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  High Rise Building
							</button>
						  </h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						  <div class="card-body">
							<ul>
								<li> <a href=""> Hotels </a> </li>
								<li> <a href=""> Dusit hotel </a> </li>
								<li> <a href=""> Vision hotel apartment </a> </li>
								<li> <a href=""> Centro hotel </a> </li>
								<li> <a href=""> Al maha rotana hotel </a> </li>
								<li> <a href=""> Hotel for h.e.mohammed </a> </li>
								<li> <a href=""> Al maha rotana </a> </li>
								<li> <a href=""> Vision residence </a> </li>
								<li> <a href=""> Al maha rotana </a> </li>
							</ul>
						  </div>
						</div>
					  </div>
					  <div class="card">
						<div class="card-header" id="headingTwo">
						  <h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  Hospitals
							</button>
						  </h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						  <div class="card-body">
							<ul>
								<li> <a href=""> Hotels </a> </li>
								<li> <a href=""> Dusit hotel </a> </li>
								<li> <a href=""> Vision hotel apartment </a> </li>
								<li> <a href=""> Centro hotel </a> </li>
							</ul>
						  </div>
						</div>
					  </div>
					  <div class="card">
						<div class="card-header" id="headingThree">
						  <h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Industrials 
							</button>
						  </h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						  <div class="card-body">
							<ul>
								<li> <a href=""> Hotels </a> </li>
								<li> <a href=""> Dusit hotel </a> </li>
								<li> <a href=""> Vision hotel apartment </a> </li>
								<li> <a href=""> Centro hotel </a> </li>
							</ul>
						  </div>
						</div>
					  </div>
					</div>
   				</div>
   				<div class="tsr-002 wow fadeInLeft">
   					<img src="images/left-banner.jpg" class="img-fluid" alt="">
   				</div>
   			</div>
   			<div class="col-lg-9 col-md-8">
   				<div class="row">
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.20s">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
						<div class="projects">
							<div class="img">
								<img src="images/p1.jpg" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="project-large.php"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="images/p1.jpg" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>Motel Al Shariea</h4>
								<p>
									Consultant	: Baynona <br>
									Main Contractor	: AL Habtoor <br> 
									Capacity	: 10000 Ton cooling
								</p>
								<ul>
									<li> <a href="project-large.php"> more info </a> </li>
									<li> <a href="inquiry.php"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
   					</div>
   				</div>
   				<div class="row">
   					<div class="col-lg-12 col-md-12">
						<div class="t-pagination">
							<ul>
								<li> <a href=""> 1 </a> </li>
								<li> <a href=""> 2 </a> </li>
								<li> <a href=""> 3 </a> </li>
								<li> <a href=""> ... </a> </li>
								<li> <a href=""> 22 </a> </li>
							</ul>
						</div>
					</div>
   				</div>
   			</div>
   		</div>
   		   		   		
   	</div>
   </div>
   
@endsection