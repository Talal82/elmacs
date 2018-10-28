@extends('layouts.master')

@section('title', 'Settings')

@section('page-title', 'Settings')




@section('content')

{!! Form::open(['route' => ['admin.settings.update', $footer -> id], 'method' => 'PUT', 'files' => true]) !!}
{{ csrf_field() }}
<div class="card">
	<div class="card-header">
		<div class="pull-left">
			<h4>Footer Details</h4>
		</div>
		<div class="pull-right">
			<input class="btn btn-primary pull-right" type="submit" value="Submit">
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="contact_title">Footer Contact Us Title:</label>
					<input class="form-control" placeholder="Get In Touch etc..." required="required" name="contact_title" type="text" value="{{ $footer -> contact_title }}" id="contact_title">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="logo">Logo:</label>
					<input type="file" class="form-control-file" name="logo" id="logo">
					<img src="{{ asset('public/uploads/images/logos/'.$footer -> logo) }}" style="margin-top: 5px; width: 250px; height: 50px;">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="detail">Footer Detail:</label>
					{!! Form::textarea('detail', $footer -> detail, array('class' => 'form-control', 'id' => 'detail')) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="contact_detail">Footer Contact Us Detail:</label>
					{!! Form::textarea('contact_detail', $footer -> contact_detail, array('class' => 'form-control', 'id' => 'contact_detail')) !!}
				</div>
			</div>

		</div>
	</div>
</div>

{!! Form::close() !!}

<hr>

{!! Form::open(['route' => ['socialicons.update', $socialIcons -> id], 'method' => 'PUT', 'files' => true]) !!}
{{ csrf_field() }}
<div class="card">
	<div class="card-header">
		<div class="pull-left">
			<h4>Social Links</h4>
		</div>
		<div class="pull-right">
			<input class="btn btn-primary pull-right" type="submit" value="Submit">
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="youtube_link">Youtube Link:</label>
					<input class="form-control" name="youtube_link" type="text" value="{{ $socialIcons -> youtube_link }}" id="youtube_link">
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="facebook_link">Facebook Link:</label>
					<input class="form-control" name="facebook_link" type="text" value="{{ $socialIcons -> facebook_link }}" id="facebook_link">
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="linkedin_link">LinkedIn Link:</label>
					<input class="form-control" name="linkedin_link" type="text" value="{{ $socialIcons -> linkedin_link }}" id="linkedin_link">
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="twitter_link">Twitter Link:</label>
					<input class="form-control" name="twitter_link" type="text" value="{{ $socialIcons -> twitter_link }}" id="twitter_link">
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="instagram_link">Instagram Link:</label>
					<input class="form-control" name="instagram_link" type="text" value="{{ $socialIcons -> instagram_link }}" id="instagram_link">
				</div>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="form-group">
					<label for="pinterest_link">Pinterest Link:</label>
					<input class="form-control" name="pinterest_link" type="text" value="{{ $socialIcons -> pinterest_link }}" id="pinterest_link">
				</div>
			</div>

		</div>
	</div>
</div>

{!! Form::close() !!}

@endsection

@section('scripts')

<script src="{{ asset('public/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		tinymce.init({
			selector: "textarea",
		});
	});
</script>

@endsection