@extends('layouts.master')

@section('title', 'Sub Projects')

@section('page-title', 'Sub Projects')

@section('stylesheets')

<style>

@font-face {
	/*font-family: DeliciousRoman;*/
	src: url(public/assets/plugins/dropify/fonts/*);
}

</style>
{{-- dropify css link --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/dropify/css/dropify.min.css') }}">

@endsection



@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12 col-lg-12">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="pull-left">
								<h4>Edit Project</h4>
							</div>
							<div class="pull-right">
								<a class="btn btn-primary" href="{{ url() -> previous() }}"> Back</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
									Info
								</a>
							</li>

							<li class="nav-item">
								<a href="#set2" data-toggle="tab" aria-expanded="false" class="nav-link">
									Image
								</a>
							</li>

						</ul>
						{!! Form::model($project, ['method' => 'PUT','route' => ['admin.sub-projects.update', $project->id], 'files' => true]) !!}
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade show active" id="home1">
								<div class="col-md-12 col-lg-12">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="name">Project Name:</label>
												{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
											</div>
										</div>

										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="form-group m-t-30 checkbox checkbox-primary">
												<input type="checkbox" id="featured" name="featured" {{ ($project -> featured == true) ? 'checked' : '' }}>
												<label for="featured"><strong>Show On Home</strong></label>
											</div>
										</div>

									</div>
								</div>
								
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label for="detail">Project Detail:</label>
										{!! Form::textarea('detail', null, array('class' => 'form-control', 'id' => 'detail')) !!}
									</div>
								</div>

							</div>
							<div role="tabpanel" class="tab-pane fade " id="set2">
								<h4>Image</h4>
								<input type="file" name="main_image" id="main_image" class="dropify form-control-file" data-height="300" data-default-file="{{ asset('public/uploads/images/projects/'.$project -> main_image ) }}">
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 m-t-15">
					<button type="submit" class="btn btn-primary btn-block">Edit Project</button>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>


@endsection


@section('scripts')

<script type="text/javascript" src="{{ asset('public/assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	$('.dropify').dropify();
	tinymce.init({
		selector: "textarea",
	});
</script>

@endsection
