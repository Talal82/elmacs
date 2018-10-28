@extends('layouts.app')

@section('title', '| Our Team')


@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
   <ul>
     <li> <a href="{{ route('index') }}"> Home </a> / </li>
     <li> <a href="" class="active"> Our Team </a> </li>
   </ul>
 </div>
</div>

<!--main banner-->


<!--short about-->



<!--short about-->

<div class="container-fluid all-pages about-us our-team">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="left-menu">
          <ul>

            @foreach($abouts as $key => $about)

            <li> <a href="{{ route('about.tab', $about -> id) }}"> {{ $about -> tab_name }}  </a> </li>

            @endforeach

            <li  class="active"> <a href="{{ route('ourteam') }}">  Our Team  </a> </li>
            <li> <a href="{{ route('certificates') }}">  Our Certificates  </a> </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9 col-md-8">

       <div class="row">
        @foreach($teams as $member)

        <div class="col-lg-6 col-md-12">
         <div class="tsr-01 wow bounceIn">
           <div class="tsr-02">
             <h5>{{ $member -> name }}</h5>
             <h6>{{ $member -> role }}</h6>
             <p>
              {{ strlen($member -> detail) > 50 ? substr($member -> detail, 0, 50).'...' : $member -> detail }}
              <br>
              <a data-fancybox data-animation-duration="300" data-src="#{{ $member -> id }}" href="javascript:;"> view more </a>
            </p>
          </div>
          <div class="tsr-03">
            <img src="{{ asset('public/uploads/images/teams/'. $member -> image) }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>

      <div style="display: none;" id="{{ $member -> id }}" class="animated-modal">
        <div class="tsr-02">
          <h2>{{ $member -> role }}</h2>
          <p>
            {{ $member -> detail }}
          </p>
        </div>
      </div>

      @endforeach


{{--         <div class="col-lg-6 col-md-12">
         <div class="tsr-01 wow bounceIn">
           <div class="tsr-02">
             <h5>Tajammal Ijaz</h5>
             <h6>General Manager</h6>
             <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry.
               <br>
               <a data-fancybox data-animation-duration="300" data-src="#animatedModal" href="javascript:;"> view more </a>
             </p>
           </div>
           <div class="tsr-03">
            <img src="images/dummy.jpg" class="img-fluid" alt="">
          </div>
        </div>
      </div>


      <div class="col-lg-6 col-md-12">
       <div class="tsr-01 wow bounceIn">
         <div class="tsr-02">
           <h5>Tajammal Ijaz</h5>
           <h6>General Manager</h6>
           <p>
             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             <br>
             <a data-fancybox data-animation-duration="300" data-src="#animatedModal" href="javascript:;"> view more </a>
           </p>
         </div>
         <div class="tsr-03">
          <img src="images/dummy.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>


    <div class="col-lg-6 col-md-12">
     <div class="tsr-01 wow bounceIn">
       <div class="tsr-02">
         <h5>Tajammal Ijaz</h5>
         <h6>General Manager</h6>
         <p>
           Lorem Ipsum is simply dummy text of the printing and typesetting industry.
           <br>
           <a data-fancybox data-animation-duration="300" data-src="#animatedModal" href="javascript:;"> view more </a>
         </p>
       </div>
       <div class="tsr-03">
        <img src="images/dummy.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>


  <div class="col-lg-6 col-md-12">
   <div class="tsr-01 wow bounceIn">
     <div class="tsr-02">
       <h5>Tajammal Ijaz</h5>
       <h6>General Manager</h6>
       <p>
         Lorem Ipsum is simply dummy text of the printing and typesetting industry.
         <br>
         <a data-fancybox data-animation-duration="300" data-src="#animatedModal" href="javascript:;"> view more </a>
       </p>
     </div>
     <div class="tsr-03">
      <img src="images/dummy.jpg" class="img-fluid" alt="">
    </div>
  </div>
</div>


<div class="col-lg-6 col-md-12">
 <div class="tsr-01 wow bounceIn">
   <div class="tsr-02">
     <h5>Tajammal Ijaz</h5>
     <h6>General Manager</h6>
     <p>
       Lorem Ipsum is simply dummy text of the printing and typesetting industry.
       <br>
       <a data-fancybox data-animation-duration="300" data-src="#animatedModal" href="javascript:;"> view more </a>
     </p>
   </div>
   <div class="tsr-03">
    <img src="images/dummy.jpg" class="img-fluid" alt="">
  </div>
</div>
</div> --}}


{{-- <div style="display: none;" id="animatedModal" class="animated-modal">
  <div class="tsr-02">
    <h2>Job Heading</h2>
    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    </p>
  </div>
</div> --}}


</div><!-- row -->
</div>
</div>
</div>
</div>


@endsection