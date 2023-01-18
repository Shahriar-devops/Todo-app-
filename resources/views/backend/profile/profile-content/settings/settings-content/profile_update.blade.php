
    <div class="tab-pane fade
    @if (old('profile_update'))
    active show
    @elseif (!old('account_update') && !old('avatar_update') && !old('password_update') && !$request->change_password)
    active show
    @endif
    "   role="tabpanel" id="settingsprofile">
        <div class="pt-3">
            <div class="settings-form">
                <h4 class="text-primary">{{ __('profile_update') }}</h4>
                <form action="{{ route('profile.settings.update',['profile_update'=>'profile']) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label  >{{ __('name') }} <span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('enter_name') }}"
                                class="form-control" name="name" value="{{ old('name',Auth::user()->name) }}" >
                            @error('name')
                               <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{ __('phone') }} <span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('enter_phone') }}"
                                class="form-control" name="phone" value="{{ old('phone',Auth::user()->phone) }}">
                            @error('phone')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">{{ __('save_changes') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
