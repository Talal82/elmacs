<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="Coderthemes">

<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Admin - @yield('title')</title>

{{-- Jquery --}}
<script src="{{ asset('public/js/jquery-3.1.1.min.js') }}"></script>

<!-- App css -->
<link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

{{-- toastr ->note[jquery is must]--}}
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


{{-- custom stylesheets if needed --}}
@yield('stylesheets')

<script src="{{ asset('public/assets/js/modernizr.min.js') }}"></script>