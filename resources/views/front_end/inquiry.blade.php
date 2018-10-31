@extends('layouts.app')

@section('title', '| Inquiry')


@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
  <ul>
    <li> <a href="{{ route('index') }}"> Home </a> / </li>
    <li > <a href="" class="active"> Inquiry </a> </li>
  </ul>
</div>
</div>

<!--main banner-->


<!--short about-->



<!--short about-->

<form action="{{ route('email.inquiry') }}" method="POST">

  {{ csrf_field() }}
  {{ method_field('POST') }}

 <div class="container-fluid all-pages apply">
  <div class="container">
    <div class="row">
      @include('errors._messages')
      <div class="col-lg-12 col-md-12">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Name </label>
              <input type="text" name="name">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Email </label>
              <input type="email" name="email">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Phone </label>
              <input type="text" name="phone">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Subject </label>
              <input type="text" name="subject">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Residence </label>
              <input type="text" name="residence">
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="input">
              <label> Nationality </label>
              <select name="nationality">

                 @foreach($nationalities as $nationality)
                <option value="{{ $nationality -> name }}"> {{ $nationality -> name }} </option>
                @endforeach

              </select>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="input">
              <label> Message </label>
              <textarea name="message">  </textarea>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="input">
              <button type="submit"> Submit Now </button>
              <button type="reset"> Reset </button>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="g-recaptcha" data-sitekey="6LeDrHcUAAAAAP6ApUPp6LemQMxyroOrCkcvFDYJ"></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</form>


@endsection