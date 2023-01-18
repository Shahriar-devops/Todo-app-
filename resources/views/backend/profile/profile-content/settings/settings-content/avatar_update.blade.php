

    <div class="tab-pane fade {{ old('avatar_update')? 'active show':'' }} "   role="tabpanel" id="avatar">
        <div class="pt-3">
            <div class="settings-form">
                <h4 class="text-primary">{{ __('avatar_update') }}</h4>
                <form action="{{ route('profile.settings.avatar.update',['avatar_update'=>'avatar']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row profiles">
                        <div class="col-12">
                                <div class="pupload mb-5 avatar text-center">
                                    <div class="thumb">
                                        <img class="pu-img" src="{{ Auth::user()->avatar_image }}" alt="clients">
                                    </div>
                                    <div class="remove-thumb">
                                        <i class="fa fa-times"></i>
                                    </div>
                                    <div class="content">
                                        <div class="mt-2">
                                            <label class="btn btn-sm btn-primary">
                                                <i class="fa fa-camera"></i>  {{ __('change_avatar') }}
                                                <input type="file" id="profile-image-upload" hidden="" name="avatar">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-12">
                                <div class="cavatar mb-5 cover-avatar text-center">
                                    <div class="thumb">
                                        <img class="cavatar-img" src="{{ Auth::user()->cover_avatar_image }}" alt="clients">
                                    </div>
                                    <div class="remove-thumb">
                                        <i class="fa fa-times"></i>
                                    </div>
                                    <div class="content">
                                        <div class="mt-2">
                                            <label class="btn btn-sm btn-primary">
                                                <i class="fa fa-camera"></i> {{ __('change_cover_avatar') }}
                                                <input type="file" id="cover-image-upload" hidden="" name="cover_avatar">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">{{ __('save_changes') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@push('scripts')
<script src="{{ static_asset('backend') }}/js/profile/avatar.js"></script>
@endpush
