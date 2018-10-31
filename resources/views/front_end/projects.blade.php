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

<div class="container-fluid all-pages">
	<div class="container">


		<div class="row">


			<!-- sidebar area -->
			<div class="col-lg-3 col-md-4">
				<div class="left-dropdown-menu wow fadeInLeft">
					<div class="accordion" id="accordionExample">
						
						@foreach($mainCategories as $main)
						@if(count($main -> subCategories) > 0)
						<div class="card"> <!-- categories card -->
							<div class="card-header" id="{{ $main -> id }}">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{ $main -> name }}" aria-expanded="true" aria-controls="{{ $main -> id }}">
										{{ $main -> name }} <!-- Main Category name here -->
									</button>
								</h5>
							</div>

							<?php 

								$show = false;
								foreach($projects as $key => $p){
									if($key = 0){
										if($main -> sub_category_id == $p -> sub_category_id){
											$show = true;
										}
										else{
											$show = false;
										}
									}
								}
								
							 ?>
							

							<div id="{{ $main -> name }}" class="collapse {{-- {{ ($show == true) ? 'show' : '' }} --}}" aria-labelledby="{{ $main -> id }}" data-parent="#accordionExample">
								<div class="card-body">
									<ul>
										@foreach($main -> subCategories as $sub)
										<li> <a href="{{ route('projects.sub', $sub -> id) }}"> {{ $sub -> name }} </a> </li>
										@endforeach
									</ul>
								</div>
							</div>

						</div> <!-- categories card -->

						@else

						<div class="card"> <!-- main categories card -->
							<div class="card-header" id="{{ $main -> id }}">
								<h5 class="mb-0">
									<a class="tornado01" href="{{ route('projects.main', $main -> id) }}">
										{{ $main -> name }} <!-- Main Category name here -->
									</a>
								</h5>
							</div>

						</div> <!-- categories card -->

						@endif
						@endforeach

					</div>
				</div>

				<div class="tsr-002 wow fadeInLeft">
					<img src="{{ asset('public/images/left-banner.jpg') }}" class="img-fluid" alt="">
				</div>
			</div>
			<!-- sidebar area -->




			<div class="col-lg-9 col-md-8"><!-- projects area -->


				<div class="row"><!-- main row --> 

					<?php $delay = 10; ?>
					@foreach($projects as $project)
					<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInLeft" data-wow-delay="0.{{ $delay }}s">
						<div class="projects">
							<div class="img">
								<img src="{{ asset('public/uploads/images/projects/'. $project -> main_image) }}" class="img-fluid" alt="">
								<div class="overly">
									<ul>
										<li> <a href="{{ route('project.large', $project -> id) }}"> <i class="fa fa-expand"></i> </a> </li>
										<li> <a href="{{ asset('public/uploads/images/projects/'. $project -> main_image) }}" data-fancybox="project"> <i class="fa fa-search"></i> </a> </li>
									</ul>
								</div>
							</div>
							<div class="detail">
								<h4>{{ $project -> name }}</h4>
								{!! strlen($project -> detail) > 80 ? substr($project -> detail, 0, 80).'...' : $project -> detail !!}
								<ul>
									@if(\Request::route()->getName() == 'project.large')
									<li> <a href="{{ route('project.large', $project -> id) }}"> more info </a> </li>
									@else
									<li> <a href="{{ route('project.large.main', $project -> id) }}"> more info </a> </li>
									@endif
									<li> <a href="{{ route('inquiry') }}"> inquiry now </a> </li>
								</ul>
							</div>
						</div>
					</div>

					<?php 
					if($delay > 30){
						$delay = 0;
					}
					$delay += 10; 
					?>
					@endforeach


				</div><!-- main row -->

				<!-- bread crumbs -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="t-pagination">
							<ul>
								{{ $projects -> links() }}
								{{-- <li> <a href=""> 1 </a> </li>
								<li> <a href=""> 2 </a> </li>
								<li> <a href=""> 3 </a> </li>
								<li> <a href=""> ... </a> </li>
								<li> <a href=""> 22 </a> </li> --}}
							</ul>
						</div>
					</div>
				</div>


			</div><!-- projects col-md-8 -->




		</div>

	</div>
</div>

@endsection

@section('scripts')

<script >
	
	$(".left-dropdown-menu>.accordion>.card>.collapse").each(function() {   
		if (this.href === window.location.href) {
			$(".left-dropdown-menu>.accordion>.card>.collapse .show").removeClass("show");
			$(this).addClass("show");
		}
	});
</script>

@endsection