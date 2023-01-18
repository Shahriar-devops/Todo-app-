@extends('backend.master')
@section('title')
{{ __('user') }} {{ __('edit') }}
@endsection
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('user') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ route('user.index') }}">{{ __('user') }}</a></li>
                <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('edit') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('user') }} {{ __('edit') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('user.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('name') }} <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="{{ __('enter_name') }}"
                                        class="form-control" name="name" value="{{ old('name',$user->name) }}" >
                                    @error('name')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('email') }} <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="{{ __('enter_email') }}"
                                        class="form-control" name="email" value="{{ old('email',$user->email) }}" >
                                    @error('email')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('phone') }} <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="{{ __('enter_phone') }}"
                                        class="form-control" name="phone" value="{{ old('phone',$user->phone) }}" >
                                    @error('phone')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('designations') }} </label>
                                    <input type="text" placeholder="{{ __('enter_designations') }}"
                                        class="form-control" name="designations" value="{{ old('designations',$user->designations) }}" >
                                    @error('designations')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('date_of_birth') }}<span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control dateofbirth" name="date_of_birth" readonly value="{{ old('date_of_birth',$user->date_of_birth) }}" >
                                    @error('date_of_birth')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('role') }} <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="role">
                                        <option selected disabled>{{ __('select') }} {{ __('role') }}</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ old('role',$user->role_id) == $role->id? 'selected':'' }}>{{ @$role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-lg-6">
                                 <div class="form-group margintop35">
                                     <label  >{{ __('gender') }} <span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="mr-2"  name="gender"  value="{{ App\Enums\Gender::MALE }}"
                                               @if(old('gender',$user->gender) == App\Enums\Gender::MALE) checked @endif>{{ __('male') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}"  @if(old('gender',$user->gender) == App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                                        </label>
                                    </div>
                                    @error('gender')
                                       <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group margintop35">
                                    <div class="d-flex ">
                                        <label  >{{ __('status') }} </label>
                                        <input type="checkbox" id="switch4" switch="success" name="status" {{ $user->status == App\Enums\Status::ACTIVE ? 'checked':'' }}  >
                                        <label class="marginleft20" for="switch4" data-on-label="{{ __('active') }}" data-off-label="{{ __('inactive') }}"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('password') }} <span class="text-danger">*</span> </label>
                                    <input type="password" placeholder="{{ __('enter_password') }}"
                                        class="form-control" name="password" value="{{ old('password') }}" >
                                    @error('password')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('address') }} </label>
                                    <input type="text" placeholder="{{ __('enter_address') }}"
                                        class="form-control" name="address" value="{{ old('address',$user->address) }}" >
                                    @error('address')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('about') }} </label>
                                    <textarea name="about" class="form-control" rows="10">{{ old('about',$user->about) }}</textarea>
                                    @error('about')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="row profiles">
                                    <div class="col-lg-6">
                                            <label  >{{ __('avatar') }} </label>
                                            <div class="pupload mb-5 avatar text-center">
                                                <div class="thumb">
                                                    <img class="pu-img" src="{{ $user->avatar_image}}" alt="clients">
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

                                    <div class="col-lg-6">
                                            <label  >{{ __('cover') }} </label>
                                            <div class="cavatar mb-5 user-create cover-avatar text-center">
                                                <div class="thumb">
                                                    <img class="cavatar-img" src="{{ $user->cover_avatar_image }}" alt="clients">
                                                </div>
                                                <div class="remove-thumb">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div class="content">
                                                    <div class="mt-2">
                                                        <label class="btn btn-sm btn-primary">
                                                            <i class="fa fa-camera"></i>{{ __('change_cover_avatar') }}
                                                            <input type="file" id="cover-image-upload" hidden="" name="cover_avatar">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>


                         <div class="col-12 text-right">
                              <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save') }}</button>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ static_asset('backend') }}/js/user/avatar.js"></script>
@endpush
