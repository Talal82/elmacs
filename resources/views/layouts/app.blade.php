<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      @include("includes/stylesheets")
    <!-- Bootstrap CSS -->

    <!-- stylesheets -->
    @yield('stylesheets')
    <!--stylesheets -->
    
    <title>{{ config('app.name') }} @yield('title')</title>
  </head>
  <body>
    
    
    
    
    <!--header-->
    @include("includes/header")
    <!--header-->

    
    <!-- page content -->
    @yield('content')
    <!-- page content -->


    <!--footer-->
    @include("includes/footer")
    <!--footer-->
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    @include("includes/plugins")

    <!-- scripts -->
    @yield('scripts')
    <!-- scripts -->
    
  </body>
</html>