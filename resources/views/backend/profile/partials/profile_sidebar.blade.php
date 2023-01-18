<div class="profile-statistics">
    <div class="border-bottom-1 pb-3">
        <div class="row">
            <div class="col-6">
                <h5 class="m-b-0">{{ __('name') }}</h5><span>{{ Auth::user()->name }}</span>
            </div>
            <div class="col-6">
                <h5 class="m-b-0">{{ __('email') }}</h5><span>{{ Auth::user()->email }}</span>
            </div>
            <div class="col-6 mt-3">
                <h5 class="m-b-0">{{ __('phone') }}</h5><span>{{ Auth::user()->phone }}</span>
            </div>
            <div class="col-6 mt-3">
                <h5 class="m-b-0">{{ __('designations') }}</h5><span>{{ Auth::user()->designations }}</span>
            </div>
            <div class="col-6 mt-3">
                <h5 class="m-b-0">{{ __('date_of_birth') }}</h5><span>{{ dateFormat(Auth::user()->date_of_birth) }}</span>
            </div>
            <div class="col-6 mt-3">
                <h5 class="m-b-0">{{ __('gender') }}</h5><span>
                    @if(Auth::user()->gender == \App\Enums\Gender::MALE)
                        {{ __('male') }}
                    @elseif(Auth::user()->gender == \App\Enums\Gender::FEMALE)
                        {{ __('female') }}
                    @endif
                </span>
            </div>
            <div class="col-12 mt-3">
                <h5 class="m-b-0">{{ __('address') }}</h5><span>{!!  Auth::user()->address!!} </span>
            </div>

        </div>

    </div>
</div>
