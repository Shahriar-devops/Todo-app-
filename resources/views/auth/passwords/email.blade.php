@extends('layouts.app')
@section('authheight') h-100 @endsection
@section('title',__('reset_password'))
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
                                        <h4 class="text-center mb-4">{{ __('reset_password') }}</h4>
                                        @if(Session::has('status'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close h-100" data-dismiss="alert"
                                                aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button> {{ Session::get('status') }}
                                        </div>
                                        @endif
                                        <form action="{{ route('password.reset.link') }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <label><strong>{{ __('email_address') }}</strong></label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                               @error('email')
                                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                               @enderror
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">  {{ __('send_password_reset_link') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

