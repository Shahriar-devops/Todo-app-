



    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    {{-- <script src="{{ static_asset('backend') }}/js/jquery-3.6.0.min.js"></script> --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="{{ static_asset('backend') }}/vendor/global/global.min.js"></script>
    <script src="{{ static_asset('backend') }}/js/quixnav-init.js"></script>
    <script src="{{ static_asset('backend') }}/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{ static_asset('backend') }}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ static_asset('backend') }}/vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="{{ static_asset('backend') }}/vendor/jqueryui/js/jquery-ui.min.js"></script>

    <script src="{{ static_asset('backend') }}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ static_asset('backend') }}/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ static_asset('backend') }}/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{ static_asset('backend') }}/vendor/flot/jquery.flot.js"></script>
    <script src="{{ static_asset('backend') }}/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ static_asset('backend') }}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="{{ static_asset('backend') }}/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ static_asset('backend') }}/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="{{ static_asset('backend') }}/js/dashboard/dashboard-1.js"></script>
    <script src="{{ static_asset('backend') }}/js/sweetalert/sweetalert2.all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" integrity="sha512-cJ2vUNryvHzgNJfmFTtZ2VX5EMT5JOU1i8nm+L1kwoHQ9bSqSYdswxyk++9Gi27p3BG2rXZXLMsTsluY4RZSSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script src="{{ static_asset('backend') }}/js/custom.js"></script>
    <script src="{{ static_asset('backend') }}/js/dynamic_modal/dynamic_modal.js"></script>
    <script type="text/javascript">
        $("html").attr('dir','{{ languageDirection(app()->getLocale()) }}');
    </script>

    @stack('scripts')

</body>

</html>
