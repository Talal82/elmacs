

@include("includes/preloader")
<header class="">
   <div class="container-fluid header">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-9">
               <div class="logo">
                  <a href="{{ route('index') }}"><img src="{{ asset('public/images/logo.png') }}" class="img-fluid" alt=""></a>
              </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-3">
           <div class="row">
              <div class="col-lg-12 col-md-12">
                 <div class="top-social-icons">
                    <ul>
                       <li> <a href="{{ route('inquiry') }}"> Request A Quote </a> </li>
                       @if($socialIcons -> facebook_link != '')
                       <li> <a href="{{ $socialIcons -> facebook_link }}" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>
                       @endif
                       @if($socialIcons -> twitter_link != '')
                       <li> <a href="{{ $socialIcons -> twitter_link }}" target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>
                       @endif
                       @if($socialIcons -> linkedin_link != '')
                       <li> <a href="{{ $socialIcons -> linkedin_link }}" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>
                       @endif
                       @if($socialIcons -> pinterest_link != '')
                       <li> <a href="{{ $socialIcons -> pinterest_link }}" target="_blank"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a> </li>
                       @endif
                       @if($socialIcons -> youtube_link != '')
                       <li> <a href="{{ $socialIcons -> youtube_link }}" target="_blank"> <i class="fa fa-youtube-play" aria-hidden="true"></i> </a> </li>
                       @endif
                       @if($socialIcons -> instagram_link != '')
                       <li> <a href="{{ $socialIcons -> instagram_link }}" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a> </li>
                       @endif
                   </ul>
               </div>
           </div>
       </div>
       <div class="row">
          <div class="col-lg-12 col-md-12">
             <div class="main-menu">
                <ul>
                   <li> <a href="{{ route('index') }}"> Home </a> </li>
                   <li> <a href="{{ route('aboutus') }}"> About </a> </li>
                   <li> <a href="{{ route('services') }}"> Services </a> </li>
                   <li> <a href="{{ route('projects') }}"> Projects </a> </li>
                   <li> <a href="{{ route('career') }}"> Careers </a> </li>
                   <li> <a href="{{ route('inquiry') }}"> Inquiry </a> </li>
                   <li> <a href="{{ route('contactus') }}"> Contact </a> </li>
               </ul>
           </div>
       </div>
   </div>
   <div class="mobile-nav-btn">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <i class="fa fa-bars" aria-hidden="true"></i> </span>
  </div>
</div>
</div>
</div>
</div>
</header>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ route('index') }}"> Home </a>
  <a href="{{ route('aboutus') }}"> About </a>
  <a href="{{ route('services') }}"> Services </a>
  <a href="{{ route('projects') }}"> Projects </a>
  <a href="{{ route('career') }}"> Careers </a>
  <a href="{{ route('inquiry') }}"> Inquiry </a>
  <a href="{{ route('contactus') }}"> Contact </a>
</div> 
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>