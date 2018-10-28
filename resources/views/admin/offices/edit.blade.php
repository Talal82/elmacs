@extends('layouts.master')

@section('title', 'Offices')

@section('page-title', 'Offices')

@section('stylesheets')

<style>

@font-face {
	/*font-family: DeliciousRoman;*/
	src: url(public/assets/plugins/dropify/fonts/*);
}

</style>

@endsection

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Edit Office</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.offices.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::model($office, ['method' => 'PATCH','route' => ['admin.offices.update', $office->id]]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="name">Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="map_link">Google Map Link:</label>
							{!! Form::text('map_link', null, array('class' => 'form-control', 'id' => 'map_link')) !!}
						</div>
					</div>	

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="detail">Detail:</label>
							{!! Form::textarea('detail', null, array('class' => 'form-control', 'id' => 'detail')) !!}
						</div>
					</div>


					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Office</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')

<script src="{{ asset('public/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		tinymce.init({
			selector: "textarea",
			plugins: "code",
		});
	});
</script>

@endsection


