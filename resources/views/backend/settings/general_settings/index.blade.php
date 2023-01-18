@extends('backend.master')
@section('title',__('general_settings') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('general_settings') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('general_settings') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)" class="active">{{ __('update') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('general_settings') }}
                </h4>
            </div>
            <div class="card-body">
                @if(hasPermission('general_settings_update'))
                    <form action="{{ route('settings.general.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                @endif
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label >{{ __('name') }}</label>
                                        <input type="text" placeholder="{{ __('enter_name') }}"
                                            class="form-control" name="name" value="{{ old('name',settings('name')) }}"   @if(!hasPermission('general_settings_update')) disabled @endif>
                                        @error('name')
                                            <p class="pt-2 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label > {{ __('email') }}</label>
                                        <input type="text" placeholder="{{ __('enter_email') }}"
                                            class="form-control" name="email" value="{{ old('email',settings('email')) }}" @if(!hasPermission('general_settings_update')) disabled @endif >
                                        @error('email')
                                            <p class="pt-2 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label > {{ __('phone') }}</label>
                                        <input type="text" placeholder="{{ __('enter_phone') }}"
                                            class="form-control" name="phone" value="{{ old('phone',settings('phone')) }}" @if(!hasPermission('general_settings_update')) disabled @endif >
                                        @error('phone')
                                            <p class="pt-2 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label > {{ __('default_language') }}</label>
                                        <select name="default_language" class="form-control" @if(!hasPermission('general_settings_update')) disabled @endif >
                                            @foreach ($languages as $language )
                                            <option value="{{ $language->code}}" {{ $language->code == settings('default_language') ? ' selected="selected"' : ''  }}>{{ $language->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label  >{{ __('copyright') }} </label>
                                        <textarea name="copyright" class="form-control" rows="10"  @if(!hasPermission('general_settings_update')) readonly disabled @endif>{{ old('copyright',settings('copyright')) }}</textarea>

                                    </div>
                                </div>


                                <div class="col-lg-6">

                                    <div class="row profiles mt-5">
                                        <div class="col-6">

                                            <div class="cavatar mb-5 cover-avatar text-center">
                                                <div class="thumb">
                                                    <img class="cavatar-img" src="{{ logo(settings('logo'))}}" alt="clients" style="object-fit: contain;">
                                                </div>
                                                <div class="remove-thumb">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div class="content">
                                                    <div class="mt-2">
                                                        @if(hasPermission('general_settings_update'))
                                                            <label class="btn btn-sm btn-primary">
                                                                <i class="fa fa-camera"></i> {{ __('change_logo') }}
                                                                <input type="file" id="cover-image-upload" hidden="" name="logo">
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-6">
                                            <div class="pupload mb-5 avatar text-center">
                                                <div class="thumb">
                                                    <img class="pu-img" src="{{ favicon(settings('favicon')) }}" alt="clients">
                                                </div>
                                                <div class="remove-thumb">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div class="content">
                                                    <div class="mt-2">
                                                        @if(hasPermission('general_settings_update'))
                                                            <label class="btn btn-sm btn-primary">
                                                                <i class="fa fa-camera"></i> {{ __('change_favicon') }}
                                                                <input type="file" id="profile-image-upload" hidden="" name="favicon">
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @if(hasPermission('general_settings_update'))
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save_changes') }}</button>
                            </div>
                            @endif
                        </div>
                    @if(hasPermission('general_settings_update'))
                    </form>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ static_asset('backend') }}/js/settings/general_settings.js"></script>
@endpush
