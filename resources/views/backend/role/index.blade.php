@extends('backend.master')
@section('title',__('role') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('role') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('role') }}</a></li>
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
                <h4 class="card-title">{{ __('role') }} {{ __('list') }}
                </h4>
                @if(hasPermission('role_create'))
                <a class="btn btn-primary text-white" href="{{ route('role.create') }}">
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
                                <th scope="col">{{ __('name') }}</th>
                                <th scope="col">{{ __('slug') }}</th>
                                <th scope="col">{{ __('permissions') }}</th>
                                <th scope="col">{{ __('status') }}</th>
                                @if(hasPermission('role_update') || hasPermission('role_delete'))
                                <th scope="col">{{ __('action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($roles as $role )

                                <tr>
                                    <td>{{ ++$i; }}</td>
                                    <td> {{ @$role->name }}</td>
                                    <td>{{ @$role->slug }}</td>
                                    <td> <span class="badge badge-primary">{{ @count($role->permissions) }}</span></td>
                                    <td>{!! $role->my_status !!}</td>
                                    @if(hasPermission('role_update') || hasPermission('role_delete'))
                                    <td>
                                        <span>
                                            @if(hasPermission('role_update'))
                                            <a href="{{ route('role.edit',$role->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i>
                                            </a>
                                            @endif
                                            @if(hasPermission('role_delete'))
                                            <form action="{{ route('role.delete',$role->id) }}" class="delete-form" method="post" id="delete" data-yes={{ __('yes') }} data-cancel="{{ __('cancel') }}" data-title="{{ __('delete_role') }}" >
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="action-btn"   data-toggle="tooltip"
                                                    data-placement="top" title="Close"><i
                                                        class="fa fa-close color-danger"></i>
                                                </button>
                                            </form>
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
                    <span class="paginate">{{ $roles->links() }}</span>
                    <p class="p-2 small paginate">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $roles->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $roles->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $roles->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
                <!-- Pagination -->
            </div>
        </div>
    </div>
</div>
@endsection
