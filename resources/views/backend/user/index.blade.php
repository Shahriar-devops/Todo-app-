@extends('backend.master')
@section('title',__('user') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('user') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('user') }}</a></li>
                <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('list') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('user') }} {{ __('list') }}
                </h4>
                @if (hasPermission('user_create'))
                <a class="btn btn-primary text-white" href="{{ route('user.create') }}">
                    <i class="fa fa-plus"></i> {{ __('add') }}
                </a>
                @endif

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('details') }}</th>
                                <th scope="col">{{ __('role') }}</th>
                                <th scope="col">{{ __('permissions') }}</th>
                                @if (hasPermission('user_ban_unban')  || hasPermission('user_status_update'))
                                <th scope="col">{{ __('status') }}</th>
                                @endif
                                @if (hasPermission('user_update')  ||
                                hasPermission('user_delete')   ||
                                hasPermission('user_permissions'))
                                <th scope="col">{{ __('action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($users as $user )

                                <tr>
                                    <td>{{ ++$i; }}</td>
                                    <td>
                                        <div class="row d-flex">
                                            <div class="col-lg-2">
                                                <img class="user-avatar" src="{{ @$user->avatar_image }}" width="60"/>
                                            </div>
                                            <div class="col-lg-10">
                                                <strong>{{@$user->name}}</strong>
                                                <p>{{@$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ @$user->role->name }}</td>
                                    <td> <span class="badge badge-primary">{{ @count($user->permissions) }}</span></td>
                                    @if (hasPermission('user_ban_unban')  || hasPermission('user_status_update'))
                                    <td data-title="Status">
                                        @if (hasPermission('user_ban_unban'))
                                        <div class="pt-25">
                                            <div class="d-flex">
                                                <input type="checkbox" class="banunban" id="banunban{{ $user->id }}" switch="danger" data-url="{{ route('user.ban.unban',$user->id) }}" {{ $user->is_ban == App\Enums\BanUser::BAN ? 'checked' : '' }} >
                                                <label for="banunban{{ $user->id }}" data-on-label="{{ __('banned') }}" data-off-label="{{ __('unban') }}"></label>
                                            </div>
                                        </div>
                                        @endif
                                        @if (hasPermission('user_status_update'))
                                        <div class="pt-25">
                                            <div class="d-flex">
                                                <input type="checkbox" class="status" id="status{{ $user->id }}" data-url="{{ route('user.status.change',$user->id) }}" switch="success"   {{ $user->status == App\Enums\Status::ACTIVE ? 'checked' : '' }} >
                                                <label for="status{{ $user->id }}" data-on-label="{{ __('active') }}" data-off-label="{{ __('inactive') }}"></label>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    @endif
                                    @if (hasPermission('user_update')  ||
                                    hasPermission('user_delete')   ||
                                    hasPermission('user_permissions'))
                                    <td>
                                        <span>
                                            @if ( hasPermission('user_permissions'))
                                                <a href="{{ route('user.permissions',$user->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="{{ __('permissions') }}">
                                                    <i class="fa fa-key color-muted"></i>
                                                </a>
                                            @endif
                                            @if (hasPermission('user_update'))
                                                <a href="{{ route('user.edit',$user->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-pencil color-muted"></i>
                                                </a>
                                            @endif
                                            @if ( hasPermission('user_delete'))
                                                @if($user->id != 1)
                                                <form action="{{ route('user.delete',$user->id) }}" class="delete-form" method="post" id="delete" data-yes={{ __('yes') }} data-cancel="{{ __('cancel') }}" data-title="{{ __('delete_user') }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="action-btn"   data-toggle="tooltip"
                                                        data-placement="top" title="Close"><i
                                                            class="fa fa-close color-danger"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            @endif
                                        </span>
                                    </td>
                                    @endif
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                  <!-- Pagination -->
                  <div class="d-flex flex-row-reverse align-items-center pagination-content">
                    <span class="paginate">{{ $users->links() }}</span>
                    <p class="p-2 small paginate">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $users->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $users->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $users->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
                <!-- Pagination -->

            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script  src="{{ static_asset('backend') }}/js/user/user.js"></script>
@endpush
