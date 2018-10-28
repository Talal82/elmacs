@extends('layouts.app')

@section('title', '| About Us')

@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
  <ul>
   <li> <a href="{{ route('index') }}"> Home </a> / </li>
   <li> <a href="" class="active"> About Us </a> </li>
 </ul>
</div>
</div>

<!--main banner-->

<div class="container-fluid all-pages about-us">
  <div class="container">
   <div class="row">
    <div class="col-lg-3 col-md-4">
     <div class="left-menu wow fadeInLeft">
      <ul>
        @foreach($abouts as $key => $about)

        <li class="{{ ($about -> id == $about_tab -> id)? 'active' : '' }}"> <a href="{{ route('about.tab', $about -> id) }}"> {{ $about -> tab_name }}  </a> </li>

        @endforeach

        @if(count($teams) > 0)
        <li> <a href="{{ route('ourteam') }}">  Our Team  </a> </li>
        @endif

        @if(count($certificates) > 0)
        <li> <a href="{{ route('certificates') }}">  Our Certificates  </a> </li>
        @endif

      </ul>
    </div>
  </div>
  <div class="col-lg-9 col-md-8 wow fadeInRight">

   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="content">
      
      {!! $about_tab -> tab_detail !!}

   </div>
 </div>
</div>
</div>
</div>
</div>
</div>

@endsection