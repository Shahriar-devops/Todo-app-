<ul class="nav nav-tabs">

    <li class="nav-item"><a
            class="nav-link @if(!old('profile_update') &&
            !old('account_update') &&
            !old('avatar_update') &&
            !old('password_update')  &&
            !$request->change_password) {{ (request()->is('admin/profile')) ? 'active' : '' }} @else   @endif" data-toggle="tab" href="#profile" data-bs-toggle="tooltip" title="Account update"
            data-bs-placement="top"  >{{ __('profile') }}</a>
    </li>
    <li class="nav-item"><a
            class="nav-link @if(old('profile_update') ||
            old('account_update') ||
            old('avatar_update') ||
            old('password_update')  ||
            $request->change_password) active @endif " data-toggle="tab" href="#settings" data-bs-toggle="tooltip" title="Account update"
            data-bs-placement="top"  >{{ __('settings') }}</a>
    </li>
</ul>
