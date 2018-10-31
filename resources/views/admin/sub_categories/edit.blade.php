@extends('layouts.master')

@section('title', 'Sub Categories')

@section('page-title', 'Sub Categories')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Edit Category</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ url() -> previous() }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::model($category, ['method' => 'PATCH','route' => ['admin.sub-categories.update', $category->id]]) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="name">Category Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit Category</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


