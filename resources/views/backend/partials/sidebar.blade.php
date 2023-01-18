<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">

            <li >
                <a class="{{ (request()->is('admin')? 'mm-active':'') }}" href="{{route('admin.dashboard')}}" aria-expanded="false">
                    <i class="icon icon-globe-2 font-size20"></i>
                    <span class="nav-text">{{ __('dashboard') }}</span>
                </a>
            </li>

            @if(hasPermission('role_read') || hasPermission('user_read'))
            <li>
                <a class="has-arrow {{ (request()->is('admin/role*','admin/user*')? 'mm-active':'') }}" href="javascript:void()" aria-expanded="false"><i
                class="fa fa-users font-size20"></i><span class="nav-text">{{ __('roles_and_users') }}</span></a>
                <ul aria-expanded="false">
                    @if(hasPermission('role_read'))
                        <li class="{{ (request()->is('admin/role*')? 'mm-active':'') }}">
                            <a href="{{route('role.index')}}" aria-expanded="false" ><span class="nav-text">{{ __('role') }}</span></a>
                        </li>
                    @endif
                    @if(hasPermission('user_read'))
                        <li class="{{ (request()->is('admin/user*')? 'mm-active':'') }}">
                            <a href="{{route('user.index')}}" aria-expanded="false" ><span class="nav-text">{{ __('user') }}</span></a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif



            @if(hasPermission('todo_read'))
            <li class="{{ (request()->is('admin/todo*')? 'mm-active':'') }}">
                <a href="{{route('todo.index')}}" aria-expanded="false">
                    <i class="fa fa-list font-size17"></i>
                    <span class="nav-text">{{ __('todo') }}</span>
                </a>
            </li>
            @endif



            @if(hasPermission('activity_logs_read'))
            <li class="{{ (request()->is('admin/activity-logs*')? 'mm-active':'') }}">
                <a href="{{route('activity.logs.index')}}" aria-expanded="false">
                    <i class="fa fa-history font-size20"></i>
                    <span class="nav-text">{{ __('activity_logs') }}</span>
                </a>
            </li>
            @endif

            @if(hasPermission('login_activity_read'))
            <li class="{{ (request()->is('admin/login-activity*')? 'mm-active':'') }}">
                <a href="{{route('login.activity.index')}}" aria-expanded="false">
                    <i class="fa fa-history font-size20"></i>
                    <span class="nav-text">{{ __('login_activity') }}</span>
                </a>
            </li>
            @endif

            @if(hasPermission('backup_read'))
            <li class="{{ (request()->is('admin/backup*')? 'mm-active':'') }}">
                <a href="{{route('backup.index')}}" aria-expanded="false">
                    <i class="fa fa-database font-size20"></i>
                    <span class="nav-text">{{ __('backup') }}</span>
                </a>
            </li>
            @endif

            @if(hasPermission('language_read'))
            <li class="{{ (request()->is('admin/language*')? 'mm-active':'') }}">
                <a href="{{route('language.index')}}" aria-expanded="false">
                    <i class="fa fa-language font-size20"></i>
                    <span class="nav-text">{{ __('language') }}</span>
                </a>
            </li>
            @endif

            @if(
            hasPermission('general_settings_read') ||
            hasPermission('mail_settings_read') ||
            hasPermission('recaptcha_settings_read')
            )
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="fa fa-cogs font-size20"></i><span class="nav-text">{{ __('settings') }}</span></a>
                <ul aria-expanded="false">
                    @if( hasPermission('general_settings_read') )
                        <li><a href="{{ route('settings.general.settings.index') }}">{{ __('general_settings') }}</a></li>
                    @endif
                    @if(hasPermission('mail_settings_read') )
                        <li><a href="{{ route('settings.mail.settings.index') }}">{{ __('mail_settings') }}</a></li>
                    @endif
                    @if(hasPermission('recaptcha_settings_read') )
                        <li><a href="{{ route('settings.recaptcha.index') }}">{{ __('recaptcha') }}</a></li>
                    @endif
                </ul>
            </li>
            @endif

        </ul>
    </div>
</div>
