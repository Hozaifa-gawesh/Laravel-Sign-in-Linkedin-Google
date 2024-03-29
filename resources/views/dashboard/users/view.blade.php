@extends('dashboard.layouts.master')
@section('title')
    {{ $data->username }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $data->username }}</h1>
                </div>
                @permission('delete-users')
                <a href="javascript:;" title="{{ __('lang.delete_user') }}" class="view_details confirm icon_item red_icon"><i class="icon-trash"></i></a>
                <form id="delete-form" action="{{ route('dashboard.users.delete', $data->id) }}" method="POST" style="display: none;">@csrf</form>
                @endpermission
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('dashboard.users') }}">{{ __('lang.users') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $data->username }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    @include('dashboard.users.include')
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">{{ __('lang.profile') }}</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            @include('includes.flash_msg')
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="sellerIn">
                                                    <p><strong>{{ __('lang.username') }}: </strong> {{ $data->username }}</p>
                                                    <p><strong>{{ __('lang.email') }}: </strong> {{ $data->email }}</p>
                                                    <p><strong>{{ __('lang.phone') }}: </strong> <span class="inline-block ltr">{{ $data->phone }}</span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


