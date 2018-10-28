@extends('layouts.master')

@section('title', 'Careers')

@section('page-title', 'Careers')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Create New Job</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.careers.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(array('route' => 'admin.careers.store','method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="title">Job Title:</label>
							{!! Form::text('title', null, array('class' => 'form-control', 'id' => 'title')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="seats">Job Seats:</label>
							{!! Form::text('seats', null, array('class' => 'form-control', 'id' => 'seats')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="detail">Job Detail:</label>
							{!! Form::textarea('detail', null, array('class' => 'form-control', 'id' => 'detail')) !!}
						</div>
					</div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Create New Job</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


