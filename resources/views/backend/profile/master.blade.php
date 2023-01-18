@extends('backend.master')
@section('title',__('profile'))
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('profile') }}</h4>
            </div>
        </div>

    </div>

@endsection
@section('content')

    {{-- profile header view --}}
    @include('backend.profile.partials.profile_info')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    @include('backend.profile.partials.profile_sidebar')
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            @include('backend.profile.partials.profile_navbar')
                            <div class="tab-content mt-3">
                                {{-- @yield('profilecontent') --}}
                                @include('backend.profile.profile-content.aboutme')
                                @include('backend.profile.profile-content.settings.master')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
