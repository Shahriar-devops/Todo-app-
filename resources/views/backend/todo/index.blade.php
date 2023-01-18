@extends('backend.master')
@section('title',__('todo') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('todo') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('todo') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)" class="active">{{ __('list') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('todo') }} {{ __('list') }}
                </h4>
                @if (hasPermission('todo_create'))
                <a class="btn btn-primary text-white" href="{{ route('todo.create') }}">
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
                                <th scope="col">{{ __('title') }}</th>
                                <th scope="col">{{ __('user') }}</th>
                                <th scope="col">{{ __('date') }}</th>
                                <th scope="col">{{ __('file') }}</th>
                                <th scope="col">{{ __('description') }}</th>
                                <th scope="col">{{ __('status') }}</th>
                                @if(hasPermission('todo_status_update'))
                                <th scope="col">{{ __('status_update') }}</th>
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
                                    <td> {{ @$todo->user->name }}</td>
                                    <td>{{ @dateFormat($todo->date) }}</td>
                                    <td><a href="{{ static_asset(@$todo->upload->original) }}" download>Download</a></td>
                                    <td>{!! $todo->description !!}</td>
                                    <td>{!! $todo->my_status !!}</td>
                                    @if(hasPermission('todo_status_update'))
                                        <td>
                                            @if($todo->status == App\Enums\TodoStatus::COMPLETED)
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"> ... </a>
                                            @else
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"> ... </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class=" ">
                                                    @if($todo->status == App\Enums\TodoStatus::PENDING)
                                                        <li class="media dropdown-item">  <a href="{{ route('todo.status.update',@$todo->id) }}">{{__('processing')}}</a>  </li>
                                                    @elseif($todo->status == App\Enums\TodoStatus::PROCESSING)
                                                        <li class="media dropdown-item">  <a href="{{ route('todo.status.update',@$todo->id) }}">{{__('completed')}}</a>  </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @endif
                                        </td>
                                    @endif
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

                    <!-- Pagination -->
                    <div class="d-flex flex-row-reverse align-items-center pagination-content">
                        <span class="paginate">{{ $todos->links() }}</span>
                        <p class="p-2 small paginate">
                            {!! __('Showing') !!}
                            <span class="font-medium">{{ $todos->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $todos->lastItem() }}</span>
                            {!! __('of') !!}
                            <span class="font-medium">{{ $todos->total() }}</span>
                            {!! __('results') !!}
                        </p>
                    </div>
                    <!-- Pagination -->

            </div>
        </div>
    </div>
</div>
@endsection
