
<div  class="tab-pane fade @if(old('profile_update') || old('account_update') || old('avatar_update') || old('password_update')  || $request->change_password) active show @endif  " role="tabpanel" id="settings">

        @include('backend.profile.profile-content.settings.navbar')
        <div class="tab-content tabcontent-border settingscontent">
             @include('backend.profile.profile-content.settings.settings-content.profile_update')
             @include('backend.profile.profile-content.settings.settings-content.account_update')
             @include('backend.profile.profile-content.settings.settings-content.avatar_update')
             @include('backend.profile.profile-content.settings.settings-content.change_password')
       </div>

</div>






