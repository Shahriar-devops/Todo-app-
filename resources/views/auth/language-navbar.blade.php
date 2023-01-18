    <div class="clearfix">
    <nav class="navbar navbar-expand float-right">

       {{-- localization --}}
        <ul class="navbar-nav header-right ">
            <li class="nav-item dropdown ">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                    <i class="{{ languageicon(app()->getLocale()) }}"></i> {{ languagename(app()->getLocale()) }} <i class="fa fa-angle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class=" ">
                        @foreach (language() as $lang)
                            <li class="media dropdown-item">
                                <span class="success"><i class="{{ @$lang->icon_class }}"></i></span>
                                <div class="pl-2 media-body">
                                    <a href="{{ route('localization',$lang->code) }}">{{ $lang->name }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
        {{-- end localization --}}
    </nav>
</div>
