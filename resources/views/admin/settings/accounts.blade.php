@extends('layouts.master')

@section('title', 'Accounts Settings')

@section('page-title', 'Settings')


@section('content')

{!! Form::open(['route' => ['account.update', Auth::user() -> id], 'method' => 'PUT', 'files' => true]) !!}
{{ csrf_field() }}
<div class="card">

	<div class="card-header">
		<div class="pull-left">
			<h4>Account Settings</h4>
		</div>
		<div class="pull-right">
			<input class="btn btn-primary pull-right" type="submit" value="Submit">
		</div>
	</div>
	
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Name:</label>
					<input class="form-control" placeholder="First Name" required="required" name="name" type="text" value="{{ Auth::user() -> name }}" id="name">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" placeholder="Email Address" required="required" name="email" type="email" value="{{ Auth::user() -> email }}" id="email">
				</div>
			</div>

			<div class="col-md-12"><label>Reset Your Password</label></div>
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" placeholder="Old Password" name="password" type="password" value="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" placeholder="Password" name="new_password" type="password" value="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input class="form-control" placeholder="Confirm Password" required="required" name="comfirm_password" type="password" value="">
				</div>
			</div>

		</div>
	</div>

</div>

{!! Form::close() !!}

@endsection