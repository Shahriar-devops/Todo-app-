@extends('backend.master')
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('dashboard') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('dashboard') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('title',__('dashboard'))
@section('content')

        <div class="row">
            <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12">
                <div id="user-activity" class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('todo') }}</h4>
                        <div class="card-action">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#todo" role="tab">
                                        {{ __('pending') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#session" role="tab">
                                        {{ __('processing') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
                                        {{ __('completed') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#all" role="tab">
                                        {{ __('all') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="todo" role="tabpanel">
                                <canvas id="activity" class="chartjs"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-md-4">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <div class="media">
                                    <span class="mr-3"><i class="ti-user"></i></span>
                                    <div class="media-body">
                                        <p class="mb-1"> {{ __('total_users') }}</p>
                                        <h4 class="mb-0">{{ $usersCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-4">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <div class="media">
                                    <span class="mr-3"><i class="fa fa-shield" style="font-size: 30px"></i></span>
                                    <div class="media-body">
                                        <p class="mb-1"> {{ __('total_roles') }}</p>
                                        <h4 class="mb-0">{{ $rolesCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-4">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <div class="media">
                                    <span class="mr-3"><i class="ti-list"></i></span>
                                    <div class="media-body">
                                        <p class="mb-1"> {{ __('total_todos') }}</p>
                                        <h4 class="mb-0">{{ $todoCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{ __('login_activity_country') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="world-map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('todo') }} {{ __('list') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('title') }}</th>
                                        <th scope="col">{{ __('date') }}</th>
                                        <th scope="col">{{ __('description') }}</th>
                                        <th scope="col">{{ __('status') }}</th>
                                        @if(hasPermission('todo_status_update'))
                                        @endif
                                        @if(hasPermission('todo_update') || hasPermission('todo_delete'))
                                        <th scope="col">{{ __('action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($todos as $todo )

                                        <tr>
                                            <td>{{ ++$i; }}</td>
                                            <td> {{ @$todo->title }}</td>
                                            <td>{{ @dateFormat($todo->date) }}</td>
                                            <td>{!! $todo->description !!}</td>
                                            <td>{!! $todo->my_status !!}</td>
                                            @if(hasPermission('todo_update') || hasPermission('todo_delete'))
                                                <td>
                                                    <span>
                                                        @if(hasPermission('todo_update'))
                                                            <a href="{{ route('todo.edit',$todo->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="{{ __('edit') }}">
                                                                <i class="fa fa-pencil color-muted"></i>
                                                            </a>
                                                        @endif
                                                        @if(hasPermission('todo_delete'))
                                                            <form action="{{ route('todo.delete',$todo->id) }}" class="delete-form" method="post" id="delete" data-yes={{ __('yes') }} data-cancel="{{ __('cancel') }}" data-title="{{ __('delete_todo') }}" >
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
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('user') }} {{ __('list') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm mb-0">
                                <thead>
                                    <tr>

                                        <th scope="col">{{ __('details') }}</th>
                                        <th scope="col">{{ __('role') }}</th>
                                        <th scope="col">{{ __('permissions') }}</th>
                                        @if (hasPermission('user_update')  ||
                                        hasPermission('user_delete')   ||
                                        hasPermission('user_permissions'))
                                        <th scope="col">{{ __('action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user )

                                        <tr>

                                            <td>
                                                <div class="row d-flex">
                                                    <div class="col-lg-3">
                                                        <img class="user-avatar" src="{{ @$user->avatar_image }}" width="30"/>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <strong>{{@$user->name}}</strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ @$user->role->name }}</td>
                                            <td> <span class="badge badge-primary">{{ @count($user->permissions) }}</span></td>

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


                    </div>
                </div>
            </div>
        </div>



@endsection

@push('scripts')
    @include('backend.dashboard_js')
@endpush
