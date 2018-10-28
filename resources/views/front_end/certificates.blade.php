@extends('layouts.app')

@section('title', '| Certificates')


@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
  <ul>
    <li> <a href="{{ route('index') }}"> Home </a> / </li>
    <li> <a href="" class="active"> Certificates </a> </li>
  </ul>
</div>
</div>

<!--main banner-->


<!--short about-->



<!--short about-->

<div class="container-fluid all-pages about-us">
  <div class="container">
   <div class="row">
    <div class="col-lg-3 col-md-4">
     <div class="left-menu" style="margin: 15px 0;">
      <ul>
       @foreach($abouts as $key => $about)

       <li> <a href="{{ route('about.tab', $about -> id) }}"> {{ $about -> tab_name }}  </a> </li>

       @endforeach
       
       <li> <a href="{{ route('ourteam') }}">  Our Team  </a> </li>
       <li class="active"> <a href="{{ route('certificates') }}">  Our Certificates  </a> </li>
     </ul>
   </div>
 </div>
 <div class="col-lg-9 col-md-8">

   <div class="row">

    @foreach($certificates as $certificate)

    <div class="col-lg-4 col-md-6 col-sm-6">
     <div class="certificates wow fadeIn" data-wow-delay="">
      <div class="img">
       <img src="{{ asset('public/uploads/images/certificates/'. $certificate -> image) }}" class="img-fluid" alt="">
       <div class="overly">
        <a href="{{ asset('public/uploads/images/certificates/'. $certificate -> image) }}" data-fancybox="certificates" data-thum="{{ asset('public/uploads/images/certificates/'. $certificate -> image) }}"> <i class="fa fa-expand"></i> </a>
        <h5>{{ $certificate -> name }}</h5>
      </div>
    </div>
  </div>
</div>

@endforeach



</div>
</div>
</div>
</div>
</div>


@endsection