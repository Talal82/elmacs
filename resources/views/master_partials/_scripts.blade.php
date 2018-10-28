<!-- jQuery  -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/detect.js') }}"></script>
<script src="{{ asset('public/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('public/assets/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollTo.min.js') }}"></script>


<!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="{{ asset('public/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

<!--Morris Chart-->
{{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
 --}}
<!-- Dashboard init -->
{{-- <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script> --}}

<!-- App js -->
<script src="{{ asset('public/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.app.js') }}"></script>

{{-- custom scrits if needed --}}
@yield('scripts')