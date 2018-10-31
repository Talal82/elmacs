@extends('layouts.master')

@section('title', 'Sub Categories')

@section('page-title', 'Sub Categories')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Create Sub Category for {{ $parentCategory -> name }}</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.sub-categories.get', $parentCategory -> id) }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(array('route' => ['admin.sub-category.store', $parentCategory -> id],'method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<label for="name">Category Name:</label>
							{!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name')) !!}
						</div>
					</div>
					
					{{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="main_category">Select Main Category:</label>
							<select id="main_category" name="main_category" class="form-control">
								@foreach($mainCategories as $category)
									<option value="{{ $category -> id }}">{{ $category -> name }}</option>
								@endforeach
							</select>
						</div>
					</div> --}}
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Create Sub Category</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


