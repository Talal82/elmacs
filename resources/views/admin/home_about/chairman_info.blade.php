@extends('layouts.master')

@section('title', 'Chairman Info')

@section('page-title', 'Chairman Info')

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
			<div class="card-header">
				<div class="pull-left">
					<h4>Edit</h4>
				</div>
				{{-- <div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.clients.index') }}"> Back</a>
				</div> --}}
			</div>
			<div class="card-body">
				{!! Form::model($about, ['method' => 'PUT','route' => ['admin.chairman-info.update', $about->id], 'files' => true]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="message_title">Message Title:</label>
							{!! Form::text('message_title', null, array('class' => 'form-control', 'id' => 'message_title', 'rows' => '5')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="message_detail">Message Detail:</label>
							{!! Form::textarea('message_detail', null, array('class' => 'form-control', 'id' => 'message_detail')) !!}
						</div>
					</div>	

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="chairman_image">Chairman's Image:</label>
							<input type="file" name="chairman_image" id="chairman_image" class="dropify form-control-file" data-height="365" data-default-file="{{ asset('public/uploads/images/chairman/'.$about -> chairman_image) }}">
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="bg_image">Chairman's Background Image:</label>
							<input type="file" name="bg_image" id="bg_image" class="dropify form-control-file" data-height="300" data-default-file="{{ asset('public/uploads/images/chairman/'.$about -> bg_image) }}">
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Chairman's Info</button>
					</div>
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
	$(document).ready(function () {
		tinymce.init({
			selector: "textarea",
		});
		$('.dropify').dropify();
	});
</script>

@endsection


