
<div class="tab-pane fade @if(!old('profile_update') && !old('account_update') && !old('avatar_update') && !old('password_update')  && !$request->change_password) active show @endif " role="tabpanel" id="profile">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-4">
            <h4 class="text-primary">{{ __('about_me') }}</h4>
            <div>{!! Auth::user()->about !!}</div>
        </div>
    </div>
</div>



