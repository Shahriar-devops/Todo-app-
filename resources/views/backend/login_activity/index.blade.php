@extends('backend.master')
@section('title',__('login_activity') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('login_activity') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('login_activity') }}</a></li>
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
                <h4 class="card-title">{{ __('login_activity') }} {{ __('list') }}
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('user') }}</th>
                                <th scope="col">{{ __('activity') }}</th>
                                <th scope="col">{{ __('ip') }}</th>
                                <th scope="col">{{ __('browser') }}</th>
                                <th scope="col">{{ __('os') }}</th>
                                <th scope="col">{{ __('device') }}</th>
                                <th scope="col">{{ __('country') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($loginActivities as $loginActivity)
                                <tr>
                                    <td> {{++$i }}</td>
                                    <td> {{ @$loginActivity->user->name }}</td>
                                    <td >{{ __(@$loginActivity->activity) }}</td>
                                    <td >{{ @$loginActivity->ip }}</td>
                                    <td >{{ @$loginActivity->browser }}</td>
                                    <td >{{ @$loginActivity->os }}</td>
                                    <td >{{ @$loginActivity->device }}</td>
                                    <td >{{ @$loginActivity->country }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                 <!-- Pagination -->
                 <div class="d-flex flex-row-reverse align-items-center pagination-content">
                    <span class="paginate">{{ $loginActivities->links() }}</span>
                    <p class="p-2 small paginate">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $loginActivities->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $loginActivities->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $loginActivities->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
                <!-- Pagination -->
            </div>
        </div>
    </div>
</div>
@endsection
