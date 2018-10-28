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
   		
   		
   		<div class="row">
   			<div class="col-lg-12 col-md-12">
   				<div class="row">
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<input type="text" name="career_title" value="{{ $career -> title }}" readonly style="background: #4e4f50; color: #fff;">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Name </label>
   							<input type="text">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Email </label>
   							<input type="text">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Phone </label>
   							<input type="text">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Company name </label>
   							<input type="text">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Address </label>
   							<input type="text">
   						</div>
   					</div>
   					<div class="col-lg-4 col-md-4">
   						<div class="input">
   							<label> Country </label>
   							<select>
   								<option value=""> Country </option>
   							</select>
   						</div>
   					</div>
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<label> Address </label>
   							<input type="file">
   						</div>
   					</div>
   					<div class="col-lg-12 col-md-12">
   						<div class="input">
   							<label> Message </label>
   							<textarea>  </textarea>
   						</div>
   					</div>
   					<div class="col-lg-6 col-md-6">
   						<div class="input">
   							<button> Submit Now </button>
   							<button> Clear </button>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		
   	</div>
   </div>
   
@endsection