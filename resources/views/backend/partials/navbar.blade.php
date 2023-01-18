

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo">
                <img class="logo-abbr desktop-logo" src="{{logo(settings('logo'))}}" alt="">
                <img class="logo-abbr mobile-logo  " src="{{favicon(settings('favicon'))}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>


                        <ul class="navbar-nav header-right">

                            {{-- localization --}}
                            <li class="nav-item dropdown ">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="{{ languageicon(app()->getLocale()) }}"></i><i class="fa fa-angle-down language-arrow"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right ">
                                    <ul class=" ">
                                        @foreach (language() as $lang)
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="{{ @$lang->icon_class }}"></i> </span>
                                                <div class="pl-2 media-body">
                                                    <a href="{{ route('localization',$lang->code) }}">{{ $lang->name }} </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            {{-- end localization --}}



                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ Auth::user()->avatar_image }}" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="{{ route('profile.index') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">{{ __('profile') }} </span>
                                    </a>
                                    <a href="{{ route('profile.index',['change_password'=>'true']) }}" class="dropdown-item">
                                        <i class="fa fa-key"></i>
                                        <span class="ml-2">{{ __('change_password') }}</span>
                                    </a>

                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                        <i class="icon-key"></i>
                                        <span class="ml-2">{{ __('logout') }} </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

