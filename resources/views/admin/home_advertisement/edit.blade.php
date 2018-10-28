@extends('layouts.master')

@section('title', 'Advertisements')

@section('page-title', 'Advertisements')


@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Edit</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.advertisements.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::model($advertisement, ['method' => 'PATCH','route' => ['admin.advertisements.update', $advertisement->id], 'files' => true]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="name">Ad Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="count">Ad Count:</label>
							{!! Form::text('count', null, array('class' => 'form-control', 'id' => 'count')) !!}
						</div>
					</div>					
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Ad</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection



