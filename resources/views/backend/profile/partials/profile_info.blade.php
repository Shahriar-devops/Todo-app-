@push('styles')
    <style>
        .photo-content .cover-photo {
            background-size: cover!important;
            background-position: center;
            min-height: 250px;
            width: 100%;
            background: url({{ Auth::user()->cover_avatar_image }});
        }
    </style>
@endpush
<div class="row">
    <div class="col-lg-12">
        <div class="profile">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                    <div class="profile-photo">
                        <img src="{{ Auth::user()->avatar_image }}" class=" user-avatar img-fluid rounded-circle" alt="">
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h4 class="text-primary">{{ Auth::user()->name }}</h4>
                                        <p>{{ Auth::user()->designations }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-email">
                                        <h4 class="text-muted">{{ Auth::user()->email }}</h4>
                                        <p>{{ __('email') }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 prf-col">
                                    <div class="profile-call">
                                        <h4 class="text-muted">{{Auth::user()->phone }}</h4>
                                        <p>{{ __('phone') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
