@extends('backend.master')
@section('title',__('backup') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('backup') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('backup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)" class="active">{{ __('download') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('backup') }}
                </h4>
            </div>
            <div class="card-body">
                <p>{{ __('backup_message') }}</p>
                <a class="btn btn-sm btn-primary"  href="{{ route('backup.download') }}">{{ __('download') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
