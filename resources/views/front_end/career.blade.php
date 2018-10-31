@extends('layouts.app')

@section('title', '| Careers')

@section('content')

<!--main banner-->
<div class="container-fluid sub-banner">
 <img src="{{ asset('public/uploads/images/banners/'. $banner -> image) }}" class="img-fluid" alt="">
 <div class="overly">
  <ul>
    <li> <a href="{{ route('index') }}"> Home </a> / </li>
    <li > <a href="" class="active"> career </a> </li>
  </ul>
</div>
</div>

<!--main banner-->


<div class="container-fluid all-pages career">
  <div class="container">
   
   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="career-table wow fadeIn">
      <table class="table">
       <thead>
        <tr>
         <th> Sr.  </th>
         <th> Title  </th>
         <th> No of job  </th>
         <th> Job Information  </th>
         <th> Action </th>
       </tr>
     </thead>
     <tbody>
      @foreach($careers as $key => $career)
      <tr>
       <td> {{ ++$key }} </td>
       <td> {{ $career -> title }} </td>
       <td> {{ $career -> seats }} </td>
       <td> {{ (strlen($career -> detail) > 80) ? substr($career -> detail, 0, 80).'...' : $career -> detail }}  </td>
       <td> <a data-fancybox data-animation-duration="300" data-src="#{{ $career -> id }}" href="javascript:;"> Read More </a> <a href="{{ route('job.apply', [$career -> id]) }}"> Apply Now </a> </td>
     </tr>
     <div style="display: none;" id="{{ $career -> id }}" class="animated-modal">
      <div class="tsr-02">
        <h2>{{ $career -> title }}</h2>
        <p>
          {{ $career -> detail }}
        </p>
        <a href="{{ route('job.apply', [$career -> id]) }}" id="abc"> Apply Now </a>
      </div>
    </div>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<div style="display: none;" id="animatedModal" class="animated-modal">
 <div class="tsr-02">
  <h2>Tajammal Ijaz</h2>
  <h6>General Manager</h6>
  <p>
   Lorem Ipsum is simply dummy text of the printing and typesetting industry.
 </p>
 <a href="apply.php" id="abc"> Apply Now </a>
</div>
</div>

@endsection