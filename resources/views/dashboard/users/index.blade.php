@php $titlePage = __('lang.users'); @endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $titlePage }}
@stop
@section('content')
    <div class="page-content-wrapper users">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>{{ $titlePage }}</h1>
                </div>
            </div>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">{{ __('lang.dashboard') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">{{ $titlePage }}</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="search-content">
                        <form action="{{ request()->fullUrl() }}" method="get" id="searchForm">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username"><small>{{ __('lang.username') }}</small></label>
                                                <input type="text" id="username" name="username" value="{{ old('username', request()->username ?? '') }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.username') }} - {{ __('lang.email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social_type">{{ __('lang.social_type') }}</label>
                                                <select id="social_type" data-title="{{ __('lang.choose') }} {{ __('lang.social_type') }}" name="social_type" class="form-control bs-select">
                                                    @foreach($drivers as $get)
                                                        <option {{ old('social_type', request()->social_type) == $get ? 'selected' : '' }} value="{{ $get }}">{{ ucfirst($get) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" id="submit" class="btn btn-block btn_search green">{{ __('lang.search_now') }}</button>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- Include Messages Flash --}}
                    @include('includes.flash_msg')
                    <div class="row">
                        <div class="col-md-12">
                            @permission('delete-users')
                            <form action="{{ route('dashboard.users.deletes') }}" method="post" id="deletesData">
                                @csrf
                                @endpermission
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">{{ $titlePage }}</span>
                                        </div>
                                        @permission('delete-users')
                                        <button type="submit" class="btn btn-danger pull-right btnDeleteAll">{{ __('lang.delete_selected') }}</button>
                                        @endpermission
                                    </div>
                                    <div class="portlet-body form">
                                        <div style="padding: 0;" class="form-body form_add form_product">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                                                            <thead class="flip-content">
                                                            <tr>
                                                                <th style="width: 50px;"><input type="checkbox" class="checkbox-style" id="DataSelect"></th>
                                                                <th> {{ __('lang.username') }} </th>
                                                                <th> {{ __('lang.email') }} </th>
                                                                <th> {{ __('lang.salutation') }} </th>
                                                                <th> {{ __('lang.social_type') }} </th>
                                                                <th style="width: 250px;"> {{ __('lang.control') }} </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($data as $get)
                                                                <tr>
                                                                    <td><input type="checkbox" class="checkbox-style DataCheckBox" value="{{ $get->id }}" name="data[]"></td>
                                                                    <td>{{ $get->username }}</td>
                                                                    <td>{{ $get->email }}</td>
                                                                    <td>{{ ucfirst($get->salutation ?? '----') }}</td>
                                                                    <td>{{ ucfirst($get->social_type ?? '----') }}</td>
                                                                    <td>
                                                                        @permission('delete-users')
                                                                        <a href="javascript:;" title="{{ __('lang.delete') }}" data-id="{{ route('dashboard.users.delete', $get->id) }}" class="btn btn-danger confirmDeleteItem"><i class="fa fa-trash"></i></a>
                                                                        @endpermission
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    {{ $data->appends(request()->query())->render() }}
                                                </div>
                                                @if(!count($data))
                                                    <div class="text-center"><p>{{ __('lang.no_data') }}</p></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @permission('delete-users')
                            </form>
                            @endpermission
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @permission('delete-users')
    <form id="delete-form" style="display:none;" method="post">@csrf</form>
    @endpermission
@stop