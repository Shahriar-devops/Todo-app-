 <!-- Nav tabs -->
 <ul class="nav nav-tabs settingsnav" role="tablist">
    <li class="nav-item">
        <a class="nav-link
        @if (old('profile_update'))
            active
        @elseif (!old('account_update') && !old('avatar_update') && !old('password_update')  && !$request->change_password)
        active
        @endif
         "  data-toggle="tab" href="#settingsprofile" data-bs-toggle="tooltip" title="{{ __('profile_update') }}"
        data-bs-placement="top"     >
            <span>
                <i class="ti-user"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ old('account_update')? 'active':'' }}"  data-toggle="tab" href="#account" data-bs-toggle="tooltip" title="{{ __('account_update') }}"
        data-bs-placement="top"    >
            <span>
                <i class="fa fa-user"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ old('avatar_update')? 'active':'' }}"  data-toggle="tab" href="#avatar" data-bs-toggle="tooltip" title="{{ __('avatar_update') }}"
        data-bs-placement="top"  >
            <span>
                <i class="fa fa-user-circle"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link
        @if (old('password_update') || $request->change_password)
            active
           @endif
           "  data-toggle="tab" href="#change_password" title="{{ __('change_password') }}"
        data-bs-placement="top"    >
            <span>
                <i class="fa fa-key"></i>
            </span>
        </a>
    </li>
</ul>
