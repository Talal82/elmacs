@extends('layouts.app')

@section('title', '| Contact Us')



@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
  <ul>
    <li> <a href="{{ route('index') }}"> Home </a> / </li>
    <li> <a href="" class="active"> Contact Us </a> </li>
  </ul>
</div>
</div>

<!--main banner-->

<div class="container-fluid all-pages contact-us">
  <div class="container">
   <div class="row">

    @foreach($offices as $office)

    <div class="col-lg-4 col-md-4">
     <div class="address wow fadeInRight">
      <h4>{{ $office -> name }}</h4>
      {!! $office -> detail !!}

    </div>
  </div>
  <div class="col-lg-8 col-md-8">
   <div class="location-map">
    <iframe src="{{ $office -> map_link }}" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>
<hr>

@endforeach

<hr>


<!--feedback form -->
<form action="{{ route('email.contact') }}" method="POST">

  {{ csrf_field() }}

  <div class="col-lg-12 col-md-12">
   <div class="row wow fadeInLeft" data-wow-delay="0.20s">

    <div class="col-lg-12 col-md-12">
     <div class="address">
      <h4>Feedback Form</h4>
    </div>
    @include('errors._messages')
  </div>
  <div class="col-lg-4 col-md-4">
   <div class="address">
    <input type="text" placeholder="Name" name="name">
  </div>
</div>
<div class="col-lg-4 col-md-4">
 <div class="address">
  <input type="email" placeholder="Email" name="email">
</div>
</div>
<div class="col-lg-4 col-md-4">
 <div class="address">
  <input type="text" placeholder="Phone" name="phone">
</div>
</div>
<div class="col-lg-12 col-md-12">
 <div class="address">
  <textarea placeholder="Subject" name="subject"></textarea>
</div>
</div>

<div class="col-lg-6 col-md-6">
 <div class="address">
  <button type="submit"> Submit </button>
</div>
</div>

<div class="col-lg-6 col-md-6">
 <div class="g-recaptcha" data-sitekey="6LeDrHcUAAAAAP6ApUPp6LemQMxyroOrCkcvFDYJ"></div>
</div>

</div>
</div>

</form>



</div>
</div>
</div>

@endsection