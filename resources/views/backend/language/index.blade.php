@extends('backend.master')
@section('title',__('language') )
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('language') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="javascript:void(0)">{{ __('language') }}</a></li>
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
                <h4 class="card-title">{{ __('language') }} {{ __('list') }}
                </h4>
                @if (hasPermission('language_create'))
                <a class="btn btn-primary text-white" href="{{ route('language.create') }}">
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
                                <th scope="col">{{ __('icon') }}</th>
                                <th scope="col">{{ __('language_name') }}</th>
                                <th scope="col">{{ __('code') }}</th>
                                <th scope="col">{{ __('status') }}</th>
                                @if (
                                hasPermission('language_update') ||
                                hasPermission('language_phrase') ||
                                hasPermission('language_delete'))
                                <th scope="col">{{ __('action') }}</th>
                                @endif

                            </tr>
                        </thead>

                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($languages as $language )

                                <tr>
                                    <td>{{ ++$i; }}</td>
                                    <td><i class="{{ @$language->icon_class }}"></i></td>
                                    <td>{{ @$language->name }}</td>
                                    <td>{{ @$language->code }}</td>
                                    <td>{!! @$language->my_status !!}</td>
                                    @if (
                                        hasPermission('language_update') ||
                                        hasPermission('language_phrase') ||
                                        hasPermission('language_delete'))
                                        <td>
                                            <span>
                                                @if ( hasPermission('language_update'))
                                                    @if($language->code !== 'en' && $language->code !== 'bn' && $language->code !== 'ar')
                                                    <a href="{{ route('language.edit',$language->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-pencil color-muted"></i>
                                                    </a>
                                                    @endif
                                                @endif
                                                @if ( hasPermission('language_phrase'))
                                                <a href="{{ route('language.edit.phrase',$language->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-language color-muted"></i>
                                                </a>
                                                @endif

                                                @if (hasPermission('language_delete'))
                                                    @if($language->code !== 'en' && $language->code !== 'bn' && $language->code !== 'ar')
                                                    <form action="{{ route('language.delete',$language->id) }}" class="delete-form" method="post" id="delete" data-yes={{ __('yes') }} data-cancel="{{ __('cancel') }}" data-title="{{ __('delete_language') }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="action-btn"   data-toggle="tooltip"
                                                            data-placement="top" title="{{ __('close') }}"><i
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
                    <span class="paginate">{{ $languages->links() }}</span>
                    <p class="p-2 small paginate">
                        {!! __('Showing') !!}
                        <span class="font-medium">{{ $languages->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $languages->lastItem() }}</span>
                        {!! __('of') !!}
                        <span class="font-medium">{{ $languages->total() }}</span>
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
