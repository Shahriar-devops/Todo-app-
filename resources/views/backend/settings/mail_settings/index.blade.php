@extends('backend.master')
@section('title',__('mail_settings') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('mail_settings') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('mail_settings') }}</a></li>
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
                <h4 class="card-title">{{ __('mail_settings') }}
                </h4>
            </div>
            <div class="card-body">
                @if(hasPermission('mail_settings_update'))
                    <form action="{{ route('settings.mail.settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    @endif
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label >{{ __('mail_driver') }} <span class="text-danger">*</span></label>
                                        <select name="mail_driver" class="form-control " id="mail_driver"  @if(!hasPermission('mail_settings_update')) disabled @endif>
                                            <option value="sendmail"  {{ old('mail_driver',settings('mail_driver')) == 'sendmail'? 'selected':'' }}>{{ __('sendmail') }}</option>
                                            <option value="smtp" {{ old('mail_driver',settings('mail_driver')) == 'smtp'? 'selected':'' }}>{{ __('smtp') }}</option>
                                        </select>
                                        @error('mail_driver')
                                            <p class="pt-2 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6 sendmail">
                                    <div class="form-group ">
                                        <label >{{ __('path') }}</label>
                                        <input type="text" placeholder="Enter path"
                                            class="form-control" name="sendmail_path" value="{{ old('sendmail_path',settings('sendmail_path')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>

                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_host') }}</label>
                                        <input type="text" placeholder="{{ __('enter_mail_host') }}"
                                            class="form-control" name="mail_host" value="{{ old('mail_host',settings('mail_host')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif >
                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_port') }}</label>
                                        <input type="text" placeholder="{{ __('enter_mail_port') }}"
                                            class="form-control" name="mail_port" value="{{ old('mail_port',settings('mail_port')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif >
                                    </div>
                                </div>

                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_address') }}</label>
                                        <input type="email" placeholder="{{ __('mail_address') }}"
                                            class="form-control" name="mail_address" value="{{ old('mail_address',settings('mail_address')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>
                                    </div>
                                </div>

                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_name') }}</label>
                                        <input type="text" placeholder="{{ __('enter_mail_name') }}"
                                            class="form-control" name="mail_name" value="{{ old('mail_name',settings('mail_name')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>
                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_username') }}</label>
                                        <input type="text" placeholder="{{ __('enter_mail_username') }}"
                                            class="form-control" name="mail_username" value="{{ old('mail_username',settings('mail_username')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>
                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_password') }}</label>
                                        <input type="password" placeholder="{{ __('mail_password') }}"
                                            class="form-control" name="mail_password" value="{{ old('mail_password',settings('mail_password')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>
                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label >{{ __('mail_encryption') }}</label>
                                        <select name="mail_encryption" class="form-control  " id="mail_encryption" @if(!hasPermission('mail_settings_update')) disabled @endif>
                                            <option value="">Null</option>
                                            <option @if(settings('mail_encryption') =='tls') selected
                                                    @endif value="tls">Tls
                                            </option>
                                            <option @if(settings('mail_encryption') =='ssl') selected
                                                    @endif value="ssl">Ssl
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6 smtp">
                                    <div class="form-group ">
                                        <label  >{{ __('signature') }} </label>
                                        <textarea name="signature" class="form-control" rows="10" >{{ old('signature',settings('signature')) }}</textarea>

                                    </div>
                                </div>

                            @if(hasPermission('mail_settings_update'))
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save_changes') }}</button>
                            </div>
                            @endif
                        </div>
                    @if(hasPermission('mail_settings_update'))
                    </form>
                    @endif
            </div>
        </div>

        <div class="card">
              <div class="card-body">
                @if(hasPermission('mail_settings_read'))
                <form action="{{ route('settings.mail.settings.testsendmail') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group ">
                                <label >{{ __('email') }} <span class="text-danger">*</span></label>
                                <input type="email" placeholder="{{ __('enter_email_address') }}"
                                    class="form-control" name="email" value="{{ old('email') }}" >
                                @error('email')
                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2 text-right margintop30">
                            <button type="submit" class="btn btn-primary save">{{ __('test') }}</button>
                        </div>
                </div>
                </form>
                @endif
              </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{static_asset('backend')}}/js/settings/mail-settings.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if (settings('mail_driver') == 'smtp')
                $('.smtp').show();
                $('.sendmail').hide();
            @elseif(settings('mail_driver') == 'sendmail')
                $('.sendmail').show();
                $('.smtp').hide();
            @endif
        })
    </script>

@endpush

