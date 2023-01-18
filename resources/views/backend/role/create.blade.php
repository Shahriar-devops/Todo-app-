@extends('backend.master')
@section('title')
{{ __('role') }} {{ __('create') }}
@endsection
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('role') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ route('role.index') }}">{{ __('role') }}</a></li>
                <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('create') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('role') }} {{ __('create') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('role.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="row">
                         <div class="col-lg-4">
                             <div class="form-group ">
                                 <label  >{{ __('name') }} <span class="text-danger">*</span></label>
                                 <input type="text" placeholder="{{ __('enter_name') }}"
                                     class="form-control" name="name" value="{{ old('name') }}" >
                                 @error('name')
                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="form-group ">
                                 <div class="d-flex justify-content-between">
                                     <label  >{{ __('status') }} </label>
                                     <input type="checkbox" id="switch4" switch="success" name="status" checked="">
                                     <label for="switch4" data-on-label="{{ __('active') }}" data-off-label="{{ __('inactive') }}"></label>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-8">
                             <div class="table-responsive">
                                 <table class="table table-responsive-sm table-bordered">
                                     <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">{{ __('module') }}</th>
                                             <th scope="col">{{ __('permissions') }}</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @php $i=0; @endphp
                                         @foreach ($permissions as $permission )
                                             <tr>
                                                 <td>{{ ++$i }}</td>
                                                 <td>{{ __($permission->attribute) }}</td>
                                                 <td class="role-permissions">
                                                     @foreach ($permission->keywords as $key=>$keyword )
                                                         <div class="row align-items-center permission-check-box pb-2 pt-2"  >
                                                             <input id="{{ $keyword }}" class="read common-key" type="checkbox" value="{{ $keyword }}" name="permissions[]"  />
                                                             <label for="{{ $keyword }}" class="permission-check-lebel">{{ __($key) }}</label>
                                                         </div>
                                                     @endforeach
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
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
    <script  src="{{ static_asset('backend') }}/js/role/role.js"></script>
@endpush
