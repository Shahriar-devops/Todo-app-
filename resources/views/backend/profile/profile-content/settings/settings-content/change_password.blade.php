

    <div class="tab-pane fade
        @if (old('password_update') || $request->change_password)
         active show
        @endif
    "   role="tabpanel" id="change_password">
        <div class="pt-3">
            <div class="settings-form">
                <h4 class="text-primary">{{ __('change_password') }}</h4>
                <form action="{{ route('profile.settings.password.update',['password_update'=>'password']) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('current_password') }}</label>
                            <input type="password" placeholder="{{ __('enter_current_password') }}"
                                class="form-control" name="current_password" value="{{ old('current_password') }}">
                            @error('current_password')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('new_password') }}</label>
                            <input type="password" placeholder="{{ __('enter_new_password') }}"
                                class="form-control" name="new_password" value="{{ old('new_password') }}">
                            @error('new_password')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('confirm_password') }}</label>
                            <input type="password" placeholder="{{ __('enter_confirm_password') }}"
                                class="form-control" name="confirm_password">
                            @error('confirm_password')
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

