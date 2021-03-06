@extends('layouts.master')

@section('title', 'Backgrounds')

@section('page-title', 'Backgrounds')

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
					<h4>Edit Backgrounds</h4>
				</div>
				{{-- <div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.clients.index') }}"> Back</a>
				</div> --}}
			</div>
			<div class="card-body">
				{!! Form::model($bg, ['method' => 'PATCH','route' => ['admin.bg.update', $bg->id], 'files' => true]) !!}
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="hiring_bg">Hiring Background:</label>
							<input type="file" name="hiring_bg" id="hiring_bg" class="dropify form-control-file" data-height="300" data-default-file="{{ asset('public/uploads/images/bg/'.$bg -> hiring_bg) }}">
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="advertisement_bg">Advertisement Background:</label>
							<input type="file" name="advertisement_bg" id="advertisement_bg" class="dropify form-control-file" data-height="300" data-default-file="{{ asset('public/uploads/images/bg/'.$bg -> advertisement_bg) }}">
						</div>
					</div>			
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Backgrounds</button>
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
	$('.dropify').dropify();
</script>

@endsection


