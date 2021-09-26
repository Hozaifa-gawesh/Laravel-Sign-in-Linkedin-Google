@extends('dashboard.layouts.master')
@section('title')
    {{ __('lang.dashboard') }}
@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1> {{ __('lang.dashboard') }}
                        <small>{{ __('lang.statistics_reports') }}</small>
                    </h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <span class="active"> {{ __('lang.dashboard') }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 bordered">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">
                                    <span data-counter="counterup" data-value="{{ $usersCount }}">{{ $usersCount }}</span>
                                </h3>
                                <small>{{ __('lang.total') }} {{ __('lang.users') }}</small>
                            </div>
                            <div class="icon">
                                <i class="icon-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 bordered">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="{{ $adminCount }}">{{ $adminCount }}</span>
                                </h3>
                                <small>{{ __('lang.total') }} {{ __('lang.admins') }}</small>
                            </div>
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('admin/assets') }}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="{{ asset('admin/assets') }}/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
@stop