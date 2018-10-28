@extends('layouts.master')

@section('title', 'Home Page Quotes')

@section('page-title', 'Home Page Quotes')

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
				{!! Form::model($quote, ['method' => 'PUT','route' => ['admin.quotes.update', $quote->id], 'files' => true]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="author_name">Author Name:</label>
							{!! Form::text('author_name', null, array('class' => 'form-control', 'id' => 'author_name', 'rows' => '5')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="main_quote">Main Quote:</label>
							{!! Form::textarea('main_quote', null, array('class' => 'form-control', 'id' => 'main_quote')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="sub_quote">Sub Quote:</label>
							{!! Form::textarea('sub_quote', null, array('class' => 'form-control', 'id' => 'sub_quote')) !!}
						</div>
					</div>

					

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="bg_image">Home Quotes Background Image:</label>
							<input type="file" name="bg_image" id="bg_image" class="dropify form-control-file" data-height="300" data-default-file="{{ asset('public/uploads/images/quotes/'.$quote -> bg_image) }}">
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
<script type="text/javascript">
	$(document).ready(function () {
		$('.dropify').dropify();
	});
</script>

@endsection


