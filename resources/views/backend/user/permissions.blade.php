@extends('backend.master')
@section('title')
{{ __('user') }} {{ __('permissions') }}
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
                <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('permissions') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('user') }} {{ __('permissions') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('user.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.permissions.update',['user_id'=>$user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">

                         <div class="col-lg-12">
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
                                                             <input id="{{ $keyword }}" class="read common-key" type="checkbox" value="{{ $keyword }}" name="permissions[]" @if(in_array($keyword,$user->permissions)) checked @endif  />
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
                              <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save_changes') }}</button>
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
