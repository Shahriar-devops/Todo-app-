@extends('layouts.app')
@section('authheight') h-100 @endsection
@section ('title',__('login'))
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
                                        <h4 class="text-center mb-4">{{ __('sign_in_your_account') }}</h4>

                                        @if(session('status'))
                                            <div class="alert alert-success d-flex align-items-center" role="alert">{{ session('status') }}</div>
                                        @endif

                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label><strong>{{ __('email') }}</strong></label>
                                                <input type="email" class="form-control" name="email" @if(Cookie::has('useremail')) ? value="{{Cookie::get('useremail')}}" : value="{{ old('email') }}" @endif >
                                               @error('email')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>
                                            <div class="form-group">
                                                <label><strong>{{ __('password') }}</strong></label>
                                                <input type="password" name="password"  class="form-control"   @if(Cookie::has('userpassword')) value="{{Cookie::get('userpassword')}}" @endif >
                                                @error('password')
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

                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input"  value="1" name="remember" type="checkbox"
                                                            id="basic_checkbox_1" @if(old('remember')) checked @endif >
                                                        <label class="form-check-label" for="basic_checkbox_1">{{ __('remember_me') }}
                                                           </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="{{ route('password.request') }}">{{ __('forgot_password') }}?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">{{ __('sign_in') }}</button>
                                            </div>
                                        </form>
                                        <div class="row mt-3">
                                            @foreach (demoUsers() as $user )
                                                <div class="col-sm-6">
                                                    <a href="{{ route('demo.login',['email'=>$user->email]) }}" class="btn mt-2 pt-3 btn-primary w-100">{{ __('login') }} {{ $user->name }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="new-account mt-3">
                                            <p>{{ __('don_t_have_an_account') }}? <a class="text-primary pt-3"
                                                    href="{{ route('register') }}">{{ __('sign_up') }}</a></p>
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
@push('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"  /> --}}
@endpush
