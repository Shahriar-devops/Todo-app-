@extends('backend.master')
@section('title',__('activity_logs') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('activity_logs') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('activity_logs') }}</a></li>
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
                <h4 class="card-title">{{ __('activity_logs') }} {{ __('list') }}
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('log_name') }}</th>
                                <th scope="col">{{ __('event') }}</th>
                                <th scope="col">{{ __('subject_type') }}</th>
                                <th scope="col">{{ __('description') }}</th>
                                <th scope="col">{{ __('view') }}</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($logs as $log)
                                <tr>
                                    <td >{{ ++$i }}</td>
                                    <td> {{@$log->log_name }}</td>
                                    <td >{{@$log->event }}</td>
                                    <td >{{ @$log->subject_type }}</td>
                                    <td >{{ @$log->description }}</td>
                                    <td >
                                        @if ($log->description !== 'deleted')
                                        <a  href="#" class=" modalBtn" data-toggle="modal" data-target="#dynamic-modal" data-modalsize="modal-lg"   data-url="{{ route('activity.logs.view',$log->id) }}" data-title="{{ __('what_changes') }}" > <i class="fa fa-eye"   data-bs-toggle="tooltip" title="{{ __('view') }}" ></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                 <!-- Pagination -->
                 <div class="d-flex flex-row-reverse align-items-center pagination-content">
                    <span class="paginate">{{ $logs->links() }}</span>
                    <p class="p-2 small paginate">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $logs->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $logs->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $logs->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
                <!-- Pagination -->
            </div>
        </div>
    </div>
</div>
@endsection
