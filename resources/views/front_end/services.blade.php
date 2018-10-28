@extends('layouts.app')

@section('title', '| Services')


@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
	<div class="overly">
		<ul>
			<li> <a href="{{ route('index') }}"> Home </a> / </li>
			<li> <a href="" class="active"> Services </a> </li>
		</ul>
	</div>
</div>



<div class="container-fluid all-pages">
	<div class="container">  		
		<div class="row">

			<?php $delay = 0; ?>
			@foreach($services as $service)

			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.{{ $delay }}s">
				<div class="services-style">
					<div class="img">
						<a href="{{ route('service.large', $service -> id) }}"><img src="{{ asset('public/uploads/images/services/'.$service -> main_image) }}" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="{{ route('service.large', $service -> id) }}">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="{{ route('service.large', $service -> id) }}"><h4>{{ $service -> name }}</h4></a>
					</div>
				</div>
			</div>
			<?php $delay += 10; ?>
			@if($delay > 30)
				<?php $delay = 10; ?>
			@endif
			@endforeach

			

			{{-- <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>Information and Communication Technology Services (ICT)</h4></a>
					</div>
				</div>
			</div>


			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.20s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>ELV & Security  Life Safety Systems </h4></a>
					</div>
				</div>
			</div>


			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.30s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>Fire Fighting Systems</h4></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeIn">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>Electrical Services</h4></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.10s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>Fire Fighting Systems</h4></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.20s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>Plumbing Systems</h4></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.30s">
				<div class="services-style">
					<div class="img">
						<a href="services-large.php"><img src="images/service1.jpg" class="img-fluid" alt=""></a>
						<div class="overly">
							<div class="read-more-btn">
								<a href="services-large.php">
									<span href=""> Read More </span>
									<span href=""> &gt; </span>
								</a>
							</div>
						</div>
					</div>
					<div class="details">
						<a href="services-large.php"><h4>HVAC Systems</h4></a>
					</div>
				</div>
			</div> --}}

		</div>

	</div>
</div>

@endsection