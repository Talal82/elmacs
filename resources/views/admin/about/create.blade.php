@extends('layouts.master')

@section('title', 'About Us')

@section('page-title', 'About Us')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Create New Tab</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.about.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(array('route' => 'admin.about.store','method'=>'POST')) !!}
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="tab_name">Tab Name:</label>
							{!! Form::text('tab_name', null, array('class' => 'form-control', 'id' => 'tab_name')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="tab_detail">Tab Detail:</label>
							{!! Form::textarea('tab_detail', null, array('class' => 'form-control', 'id' => 'tab_detail')) !!}
						</div>
					</div>

					

					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Create New Tab</button>
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


