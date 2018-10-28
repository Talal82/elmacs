@extends('layouts.master')

@section('title', 'Nationalities')

@section('page-title', 'Nationalities')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Create New Nationality</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.nationality.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(array('route' => 'admin.nationality.store','method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="name">Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Create New Nationality</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


