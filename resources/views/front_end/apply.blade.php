@extends('layouts.app')

@section('title', '| Apply')

@section('content')
    
    <!--main banner-->
    <div class="container-fluid sub-banner">
    	<img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
    	<div class="overly">
    		<ul>
				<li> <a href="{{ route('index') }}"> Home </a> / </li>
				<li > <a href="" class="active"> Apply </a> </li>
			</ul>
    	</div>
    </div>
    
    <!--main banner-->

  
  <!--short about-->
   
   
   
   <!--short about-->
   
   <div class="container-fluid all-pages apply">
   	<div class="container">
   		
   		{!! Form::open(array('route' => 'email.apply','method'=>'POST', 'files' => true)) !!}

   		<div class="row">
   			<div class="col-lg-12 col-md-12">
   				<div class="row">
            @include('errors._messages')
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<input type="text" name="job_title" value="{{ $career -> title }}" readonly style="background: #4e4f50; color: #fff;">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Name </label>
   							<input type="text" name="name" value="{{ old('name') }}">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Email </label>
   							<input type="text" name="email" value="{{ old('email') }}">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Phone </label>
   							<input type="text" name="phone" value="{{ old('phone') }}">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Company name </label>
   							<input type="text" name="company" value="{{ old('company') }}">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Address </label>
   							<input type="text" name="address" value="{{ old('address') }}">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Nationalities </label>
   							<select name="nationality">
                  @foreach($nationalities as $nationality)
   								<option value="{{ $nationality -> name }}"> {{ $nationality -> name }} </option>
                  @endforeach
   							</select>
   						</div>
   					</div>
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<label> CV </label>
   							<input type="file" name="cv" value="{{ old('cv') }}">
   						</div>
   					</div>
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<label> Message </label>
   							<textarea name="message" value="{{ old('message') }}">  </textarea>
   						</div>
   					</div>
   					<div class="col-lg-6 col-md-6">
   						<div class="input">
   							<button type="submit"> Submit Now </button>
   							<button type="reset"> Clear </button>
   						</div>
   					</div>

            <div class="col-lg-6 col-md-6">
              <div class="input">
                <div class="g-recaptcha" data-sitekey="6LeDrHcUAAAAAP6ApUPp6LemQMxyroOrCkcvFDYJ"></div>
              </div>
            </div>
            
   				</div>
   			</div>
   		</div>

    {!! Form::close() !!}
   		
   	</div>
   </div>
   
@endsection