@extends('layouts.app')
@section('authheight') h-100 @endsection
@section ('title',__('register'))
@section('content')
    @include('auth.language-navbar')

        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-lg-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-lg-12">
                                    <div class="auth-form">
                                        <h4 class="text-center mb-4">{{ __('register') }}</h4>

                                        @if(session('status'))
                                            <div class="alert alert-success d-inline-block align-items-center" role="alert">{!! session('status') !!}</div>
                                        @endif

                                        <form action="{{ route('register') }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <label><strong>{{ __('name') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                               @error('name')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>

                                            <div class="form-group">
                                                <label><strong>{{ __('email') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                               @error('email')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>


                                            <div class="form-group">
                                                <label><strong>{{ __('phone') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                               @error('phone')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>

                                            <div class="form-group">
                                                <label><strong>{{ __('gender') }}</strong> <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="mr-2"  name="gender"  value="{{ App\Enums\Gender::MALE }}"
                                                               @if(old('gender',App\Enums\Gender::MALE) == App\Enums\Gender::MALE) checked @endif>{{ __('male') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}"  @if(old('gender') == App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                                                        </label>
                                                    </div>
                                                </div>
                                               @error('gender')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>
                                            <div class="form-group">
                                                <label><strong>{{ __('date_of_birth') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="text" id="dateOfBirth" class="form-control dateofbirth" readonly="readonly" data-toggle="datepicker"  name="date_of_birth" value="{{ old('date_of_birth',Date('d-m-Y')) }}">
                                               @error('date_of_birth')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>


                                            <div class="form-group">
                                                <label><strong>{{ __('password') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" >
                                                @error('password')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label><strong>{{ __('confirm_password') }}</strong> <span class="text-danger">*</span></label>
                                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" >
                                                @error('password_confirmation')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                @if(settings('recaptcha_status') && settings('recaptcha_status') == 1)
                                                    <div class="g-recaptcha" data-sitekey="{{ settings('recaptcha_site_key') }}"></div>
                                                    @error('g-recaptcha-response')
                                                        <p class="text-danger pt-2">{{ $message }}</p>
                                                    @enderror
                                                @endif
                                            </div>


                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('register') }}</button>
                                            </div>
                                        </form>
                                            <div class="mt-3">
                                                {{ __('already_have_an_account') }} ? <a href="{{ route('login') }}">{{ __('login') }}</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

