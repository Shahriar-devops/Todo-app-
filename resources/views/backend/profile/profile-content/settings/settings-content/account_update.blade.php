
    <div class="tab-pane fade {{ old('account_update')? 'active show':'' }} "   role="tabpanel" id="account">
        <div class="pt-3">
            <div class="settings-form">
                <h4 class="text-primary">{{ __('account_update') }}</h4>
                <form action="{{ route('profile.settings.account.update',['account_update'=>'account']) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('email') }} <span class="text-danger">*</span></label>
                            <input type="email" placeholder="{{ __('enter_email') }}"
                                class="form-control" name="email" value="{{ old('email',Auth::user()->email) }}">
                            @error('email')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label >{{ __('designations') }} <span class="text-danger">*</span></label>
                            <input type="text" placeholder="{{ __('enter_designations') }}"
                                class="form-control" name="designations" value="{{ old('designations',Auth::user()->designations) }}">
                            @error('designations')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('date_of_birth') }} <span class="text-danger">*</span></label>
                            <input type="text" id="dateOfBirth" class="form-control dateofbirth" readonly="readonly" data-toggle="datepicker"  name="date_of_birth" value="{{ old('date_of_birth',Auth::user()->date_of_birth) }}">
                            @error('date_of_birth')
                                 <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('gender') }} <span class="text-danger">*</span></label>

                            <div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="mr-2"  name="gender"  value="{{ App\Enums\Gender::MALE }}"
                                            @if(old('gender',Auth::user()->gender) == App\Enums\Gender::MALE) checked @endif>
                                            {{ __('male') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}"  @if(old('gender',Auth::user()->gender) == App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                                    </label>
                                </div>

                               @error('gender')
                                    <p class="pt-2 text-danger">{{ $message }}</p>
                               @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('address') }}</label>
                         <textarea class="form-control" name="address" placeholder="{{ __('enter_address') }}" rows="5">{{ old('address',Auth::user()->address) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>{{ __('about_me') }}</label>
                         <textarea class="form-control froala-editor" name="about" rows="5">{{ old('about',Auth::user()->about) }}</textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">{{ __('save_changes') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
