@extends('layouts.master')

@section('title', 'Short About')

@section('page-title', 'Short About')



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
				{!! Form::model($about, ['method' => 'PUT','route' => ['admin.short-about.update', $about->id]]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="short_about">Home Page Short About:</label>
							{!! Form::textarea('short_about', null, array('class' => 'form-control', 'id' => 'short_about')) !!}
						</div>
					</div>		
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Short About</button>
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
		});
	});
</script>

@endsection


