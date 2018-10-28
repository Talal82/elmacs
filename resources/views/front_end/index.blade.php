@extends('layouts.app')

@section('title', '| Home')

@section('content')

<!--main banner-->
<div class="container-fluid main-banner wow fadeIn">
 <div class="owl-carousel main-slider owl-theme">

  @foreach($banners as $banner)

  <div class="item">
   <div class="slider">
    <img src="{{ asset('public/uploads/images/banners/'.$banner -> image) }}" class="img-fluid" alt="">
    <div class="overly">
      <h4>{{ $banner -> text }}</h4>
    </div>
  </div>
</div>

@endforeach

</div>
</div>

<!--main banner-->


<!--short about-->

<div class="container-fluid shrot-about">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="main-page-heading wow fadeInDown">
      <h6>Welcome to</h6>
      <h4>ELMACS CO. LLC</h4>
      <img src="{{ asset('public/images/01.png') }}" alt="">
    </div>
    <div class="paraghraph wow fadeInUp">
      {!! strlen($about -> short_about) > 400 ? substr($about -> short_about, 0, 400).'...' : $about -> short_about !!}
    </div>
    <div class="read-more-btn wow fadeInUp">
      <a href="{{ route('aboutus') }}">
       <span> Read More </span>
       <span> > </span>
     </a>
   </div>
 </div>
</div>
</div>
</div>

<!--short about-->

<div class="container-fluid chairman-message" style="background: url('public/uploads/images/chairman/{{ $about -> bg_image }}') center top no-repeat;">
  <div class="container">
   <div class="row">
    <div class="col-lg-2 col-md-3">
     <div class="img wow bounceIn">
      <img src="{{ asset('public/uploads/images/chairman/'. $about -> chairman_image) }}" alt="">
    </div>
  </div>
  <div class="col-lg-10 col-md-9 wow fadeInLeft">
   <div class="message">
    <h4>{{ $about -> message_title }}</h4>
    {!! strlen($about -> message_detail) > 350 ? substr($about -> message_detail, 0, 350).'...' : $about -> message_detail !!}
  </div>
  <div class="read-more-btn">
    <a href="{{ route('aboutus') }}">
     <span href=""> Read More </span>
     <span href=""> > </span>
   </a>
 </div>
</div>
</div>
</div>
</div>


<!--services start -->
@if(count($services) > 0)
<div class="container-fluid stander-padding">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="main-page-heading">
      <h6>Our</h6>
      <h4>Exclusive Services</h4>
      <img src="{{ asset('public/images/01.png') }}" alt="">
    </div>
  </div>
</div>


<div class="row">
 <div class="col-lg-12 col-md-12">
  <div class="owl-carousel slider1 owl-theme">

  <?php $delay = 20; ?>

  @foreach($services as $service)
   <div class="item wow bounceIn" data-wow-delay="0.{{ $delay }}s">
     <div class="services-style">
      <div class="img">
       <img src="{{ asset('public//uploads/images/services/'. $service -> main_image ) }}" class="img-fluid" alt="">
       <div class="overly">
        <div class="read-more-btn">
         <a href="{{ route('service.large', $service -> id) }}">
          <span href=""> Read More </span>
          <span href=""> > </span>
        </a>
      </div>
    </div>
  </div>
  <div class="details">
   <a href="{{ route('service.large', $service -> id) }}"><h4>{{ $service -> name }}</h4></a>
 </div>
</div>
</div>

<?php $delay += 10; ?>
@endforeach


{{-- <div class="item wow bounceIn" data-wow-delay="0.30s">
 <div class="services-style">
  <div class="img">
   <img src="{{ asset('public/images/service1.jpg') }}" class="img-fluid" alt="">
   <div class="overly">
    <div class="read-more-btn">
     <a href="services-large.php">
      <span href=""> Read More </span>
      <span href=""> > </span>
    </a>
  </div>
</div>
</div>
<div class="details">
 <a href="services-large.php"><h4>Building Planning</h4></a>
</div>
</div>
</div>


<div class="item wow bounceIn" data-wow-delay="0.40s">
 <div class="services-style">
  <div class="img">
   <img src="{{ asset('public/images/service1.jpg') }}" class="img-fluid" alt="">
   <div class="overly">
    <div class="read-more-btn">
     <a href="services-large.php">
      <span href=""> Read More </span>
      <span href=""> > </span>
    </a>
  </div>
</div>
</div>
<div class="details">
 <a href="services-large.php"><h4>Building Planning</h4></a>
</div>
</div>
</div>


<div class="item wow bounceIn" data-wow-delay="0.50s">
 <div class="services-style">
  <div class="img">
   <img src="{{ asset('public/images/service1.jpg') }}" class="img-fluid" alt="">
   <div class="overly">
    <div class="read-more-btn">
     <a href="services-large.php">
      <span href=""> Read More </span>
      <span href=""> > </span>
    </a>
  </div>
</div>
</div>
<div class="details">
 <a href="services-large.php"><h4>Building Planning</h4></a>
</div>
</div>
</div>


<div class="item wow bounceIn" data-wow-delay="0.60s">
 <div class="services-style">
  <div class="img">
   <img src="{{ asset('public/images/service1.jpg') }}" class="img-fluid" alt="">
   <div class="overly">
    <div class="read-more-btn">
     <a href="services-large.php">
      <span href=""> Read More </span>
      <span href=""> > </span>
    </a>
  </div>
</div>
</div>
<div class="details">
 <a href="services-large.php"><h4>Building Planning</h4></a>
</div>
</div>
</div> --}}


</div>
</div>
</div>


</div>
</div>
@endif
<!-- services end -->

<div class="container-fluid section2" style="background: url('public/uploads/images/quotes/{{ $quote -> bg_image }}') center top no-repeat;">
  <div class="container">
   <div class="row">
    <div class="col-lg-7 col-md-7">
     <div class="pride wow fadeInRight">
      <h4> <img src="{{ asset('public/images/left-icon.png') }}" alt=""> &nbsp; &nbsp;  {{ $quote -> main_quote }}  &nbsp; &nbsp; <img src="{{ asset('public/images/right-icon.png') }}" alt=""> </h4>
      <p>“{{ $quote -> sub_quote }}”</p>
      <h5>{{ $quote -> author_name }}</h5>
    </div>
  </div>
</div>
</div>
</div>

<div class="container-fluid section3">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="main-page-heading">
      <h6>Our</h6>
      <h4>Latest Projects</h4>
      <img src="{{ asset('public/images/01.png') }}" alt="">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-12">
   <div class="project-style wow bounceIn" data-wow-delay="">
    <a href="project-large.php"><img src="{{ asset('public/images/10.jpg') }}" class="img-fluid" alt=""></a>
    <div class="overly">
      <a href="project-large.php"><h4> Presidential Palace <br>
      Hardscape </h4></a>
      <ul>
        <li>  <a href="{{ asset('public/images/10.jpg') }}" data-fancybox="image"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a></li>
        <li>
         <div class="read-more-btn">
           <a href="project-large.php">
            <span href=""> Read More </span>
            <span href=""> > </span>
          </a>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>
<div class="col-lg-6 col-md-12">
 <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="project-style project-style2 wow bounceIn" data-wow-delay="0.10s">
     <a href="project-large.php"><img src="{{ asset('public/images/02.jpg') }}" class="img-fluid" alt=""></a>
     <div class="overly">
       <a href="project-large.php"><h4> Presidential</h4></a>
       <ul>
         <li>  <a href="{{ asset('public/images/02.jpg') }}" data-fancybox="image1"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a></li>
         <li>
          <div class="read-more-btn">
           <a href="project-large.php">
            <span href=""> View Project </span>
            <span href=""> > </span>
          </a>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
 <div class="project-style project-style2 wow bounceIn" data-wow-delay="0.20s">
   <a href="project-large.php"><img src="{{ asset('public/images/02.jpg') }}" class="img-fluid" alt=""></a>
   <div class="overly">
     <a href="project-large.php"><h4> Presidential</h4></a>
     <ul>
       <li>  <a href="{{ asset('public/images/02.jpg') }}" data-fancybox="image2"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a></li>
       <li>
        <div class="read-more-btn">
         <a href="project-large.php">
          <span href=""> View Project </span>
          <span href=""> > </span>
        </a>
      </div>
    </li>
  </ul>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
 <div class="project-style project-style2 wow bounceIn" data-wow-delay="0.30s">
   <a href="project-large.php"><img src="{{ asset('public/images/02.jpg') }}" class="img-fluid" alt=""></a>
   <div class="overly">
     <a href="project-large.php"><h4> Presidential</h4></a>
     <ul>
       <li>  <a href="{{ asset('public/images/02.jpg') }}" data-fancybox="image3"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a></li>
       <li>
        <div class="read-more-btn">
         <a href="project-large.php">
          <span href=""> View Project </span>
          <span href=""> > </span>
        </a>
      </div>
    </li>
  </ul>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
 <div class="project-style project-style2 wow bounceIn" data-wow-delay="0.40s">
   <a href="project-large.php"><img src="{{ asset('public/images/02.jpg') }}" class="img-fluid" alt=""></a>
   <div class="overly">
     <a href="project-large.php"><h4> Presidential</h4></a>
     <ul>
       <li>  <a href="{{ asset('public/images/02.jpg') }}" data-fancybox="image4"> <i class="fa fa-search-plus" aria-hidden="true"></i> </a></li>
       <li>
        <div class="read-more-btn">
         <a href="project-large.php">
          <span href=""> View Project </span>
          <span href=""> > </span>
        </a>
      </div>
    </li>
  </ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12">
   <div class="read-more-btn">
    <a href="projects.php">
     <span href=""> View All </span>
     <span href=""> > </span>
   </a>
 </div>
</div>
</div>
</div>
</div>

<div class="container-fluid left-section" style="background: url('public/uploads/images/bg/{{ $bg -> hiring_bg }}') center top no-repeat;">
  <div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-12 ">
      <h4>We Are Hiring</h4>
      <h5>Your Best Career Choice Starts With ELMACS CO. LLC.</h5>
      <div class="read-more-btn">
       <a href="{{ route('career') }}">
        <span href=""> Apply Job </span>
        <span href=""> > </span>
      </a>
    </div>
  </div>

</div>
</div>
</div>


<div class="container-fluid right-section" style="background: url('public/uploads/images/bg/{{ $bg -> advertisement_bg }}') center top no-repeat;">
  <div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-12 ">
      <ul id="counter">

        @foreach($advertisements as $ad)
        <li>
          <h4>{{ $ad -> name }}</h4>
          <br>
          <span class="counter-value" data-count="{{ $ad -> count }}">  </span>
        </li>
        @endforeach

      </ul>
    </div>
  </div>
</div>
</div>


@if(count($clients) > 0)
<div class="container-fluid clients-logo">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="main-page-heading wow bounceIn">
          <h6>Our</h6>
          <h4>Satisfied Clients</h4>
          <img src="{{ asset('public/images/01.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@endsection

@section('scripts')
<script>

		//counter 
   var a = 0;
   $(window).scroll(function() {

    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a === 0 && $(window).scrollTop() > oTop) {
      $('.counter-value').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        },

        {

          duration: 3000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
      });
      a = 1;
    }

  });
    //counter 

  </script>

  @endsection