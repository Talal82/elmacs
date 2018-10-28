@extends('layouts.master')

@section('title', 'Our Team')

@section('page-title', 'Our Team')

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
					<h4>Edit Member</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.teams.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::model($member, ['method' => 'PATCH','route' => ['admin.teams.update', $member->id], 'files' => true]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="name">Member Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="role">Member Role:</label>
							{!! Form::text('role', null, array('class' => 'form-control', 'id' => 'role')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="detail">Member Detail:</label>
							{!! Form::textarea('detail', null, array('class' => 'form-control', 'id' => 'detail', 'rows' => '14')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="image">Member Image:</label>
							<input type="file" name="image" id="image" class="dropify form-control-file" data-height="295" data-default-file="{{ asset('public/uploads/images/teams/'.$member -> image) }}">
						</div>
					</div>					
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Member</button>
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


