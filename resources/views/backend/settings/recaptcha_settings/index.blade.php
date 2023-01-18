@extends('backend.master')
@section('title',__('recaptcha_settings') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('recaptcha_settings') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('recaptcha_settings') }}</a></li>
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
                <h4 class="card-title">{{ __('recaptcha_settings') }}
                </h4>
            </div>
            <div class="card-body">
                @if(hasPermission('recaptcha_settings_update'))
                    <form action="{{ route('settings.recaptcha.update',['recaptcha'=>true]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                @endif
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label >{{ __('site_key') }}</label>
                                    <input type="text" placeholder="{{ __('enter_site_key') }}"
                                        class="form-control" name="recaptcha_site_key" value="{{ old('recaptcha_site_key',settings('recaptcha_site_key')) }}" @if(!hasPermission('recaptcha_settings_update')) disabled @endif >
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label >{{ __('secret_key') }}</label>
                                    <input type="text" placeholder="{{ __('enter_secret_key') }}"
                                        class="form-control" name="recaptcha_secret_key" value="{{ old('recaptcha_secret_key',settings('recaptcha_secret_key')) }}" @if(!hasPermission('recaptcha_settings_update')) disabled @endif>
                                </div>
                            </div>


                            <div class="col-lg-4 mt35px">
                                <div class="form-group ">
                                    <div class="d-flex justify-content-between">
                                        <label  >{{ __('status') }} </label>
                                        <input type="checkbox" id="switch4" switch="success" name="recaptcha_status"  {{ old('status',@settings('recaptcha_status')) == 1? 'checked': '' }} @if(!hasPermission('recaptcha_settings_update')) disabled @endif>
                                        <label for="switch4" data-on-label="{{ __('enable') }}" data-off-label="{{ __('disable') }}"></label>
                                    </div>
                                </div>
                            </div>

                            @if(hasPermission('recaptcha_settings_update'))
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save_changes') }}</button>
                            </div>
                            @endif
                        </div>
                    @if(hasPermission('recaptcha_settings_update'))
                    </form>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

