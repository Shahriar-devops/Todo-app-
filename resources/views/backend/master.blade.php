
        @include('backend.partials.header')

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">
            @include('backend.partials.navbar')
            <!--**********************************
                Sidebar start
            ***********************************-->
            @include('backend.partials.sidebar')
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->
            @include('backend.partials.footer_text')
        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->
        @include('backend.partials.dynamic_modal')
        @include('backend.partials.footer')

