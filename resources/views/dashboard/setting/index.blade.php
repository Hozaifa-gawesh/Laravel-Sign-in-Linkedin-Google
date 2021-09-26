@php $titlePage = __('lang.setting'); @endphp
@extends('dashboard.layouts.master')
@section('title')
    {{ $titlePage }}
@stop
@section('content')
    <div class="page-content-wrapper">
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
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-green-haze"></i>
                                    <span class="caption-subject font-green-haze bold uppercase">{{ $titlePage }}</span>
                                </div>
                            </div>
                            <div class="portlet-body form {{ !auth('admin')->user()->hasPermission('update-settings') ? 'not_permission_setting' : '' }}">
                                {{-- Include Messages Flash --}}
                                @include('includes.flash_msg')
                                @permission('update-settings')
                                <form method="post" action="{{ route('dashboard.settings') }}" enctype="multipart/form-data">
                                    @csrf
                                    @endpermission

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                                                    </li>
                                                    <li>
                                                        <a href="#Copyright" data-toggle="tab"> {{ __('lang.copyright_text') }} </a>
                                                    </li>
                                                    <li>
                                                        <a href="#Download" data-toggle="tab"> {{ __('lang.download') }} </a>
                                                    </li>
                                                    <li>
                                                        <a href="#API" data-toggle="tab"> API</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active in" id="General">
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                                                <label for="site_name">Site Name <span class="required">*</span> </label>
                                                                <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $setting->where('key', 'site_name')->first()->val) }}" class="form-control" placeholder="Enter Site Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('sm_description') ? 'has-error' : '' }}">
                                                                <label for="sm_description">Short Description <span class="required">*</span> </label>
                                                                <input name="sm_description" id="sm_description" value="{{ old('sm_description', $setting->where('key', 'sm_description')->first()->val) }}" class="form-control" placeholder="Enter Short Description">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                                                <label for="address">Address </label>
                                                                <input type="text" name="address" id="address" value="{{ old('address', $setting->where('key', 'address')->first()->val) }}" class="form-control" placeholder="Enter Address" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                                                                <label for="phone_1">{{ __('lang.phone') }} 1 <span class="required">*</span> </label>
                                                                <input type="text" name="phone_1" id="phone_1" value="{{ old('phone_1', $setting->where('key', 'phone_1')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }} 1" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
                                                                <label for="phone_2">{{ __('lang.phone') }} 2 </label>
                                                                <input type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', $setting->where('key', 'phone_2')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }} 2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('email_1') ? 'has-error' : '' }}">
                                                                <label for="email_1">{{ __('lang.email') }} 1 <span class="required">*</span> <code style="font-size: 11px;">{{ __('lang.email_receive') }}</code></label>
                                                                <input type="text" name="email_1" id="email_1" value="{{ old('email_1', $setting->where('key', 'email_1')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.email') }} 1" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('email_2') ? 'has-error' : '' }}">
                                                                <label for="email_2">{{ __('lang.email') }} 2</label>
                                                                <input type="text" name="email_2" id="email_2" value="{{ old('email_2', $setting->where('key', 'email_2')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.email') }} 2" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                                                <label for="location">{{ __('lang.map_link') }}</label>
                                                                <input type="url" name="location" id="location" value="{{ old('location', $setting->where('key', 'location')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.map_link') }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                                                                <label for="facebook">{{ __('lang.facebook') }}</label>
                                                                <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $setting->where('key', 'facebook')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.facebook') }} {{ __('lang.link') }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                                                                <label for="twitter">{{ __('lang.twitter') }}</label>
                                                                <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $setting->where('key', 'twitter')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.twitter') }} {{ __('lang.link') }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                                                                <label for="instagram">{{ __('lang.instagram') }}</label>
                                                                <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $setting->where('key', 'instagram')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.instagram') }} {{ __('lang.link') }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group {{ $errors->has('snapchat') ? 'has-error' : '' }}">
                                                                <label for="snapchat">{{ __('lang.snapchat') }}</label>
                                                                <input type="url" name="snapchat" id="snapchat" value="{{ old('snapchat', $setting->where('key', 'snapchat')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.snapchat') }} {{ __('lang.link') }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                                                <label class="display-block" for="logo">{{ __('lang.choose') }} {{ __('lang.logo') }} <span class="required"> {{ __('lang.best_size') }} ({{ __('lang.width') }}:180 * {{ __('lang.height') }}:64)</span></label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img src="{{ asset($setting->where('key', 'logo')->first()->val) }}"/>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                    <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.logo') }}</span>
                                                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.logo') }} </span>
                                                                        <input type="file" name="logo" id="logo">
                                                                    </span>
                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group {{ $errors->has('logo_white') ? 'has-error' : '' }}">
                                                                <label class="display-block" for="logo_white">{{ __('lang.choose') }} {{ __('lang.logo_white') }} <span class="required"> {{ __('lang.best_size') }} ({{ __('lang.width') }}:180 * {{ __('lang.height') }}:64)</span></label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail black_icon">
                                                                        <img src="{{ asset($setting->where('key', 'logo_white')->first()->val) }}"/>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                    <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.logo_white') }}</span>
                                                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.logo_white') }} </span>
                                                                        <input type="file" name="logo_white" id="logo_white">
                                                                    </span>
                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                                                                <label class="display-block" for="favicon">{{ __('lang.choose') }} {{ __('lang.favicon') }} <span class="required"> {{ __('lang.best_size') }} (50 * 50)</span></label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img style="width: 70px;" src="{{ asset($setting->where('key', 'favicon')->first()->val) }}"/>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                                                    <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.favicon') }}</span>
                                                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.favicon') }} </span>
                                                                        <input type="file" name="favicon" id="favicon">
                                                                    </span>
                                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="Copyright">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group {{ $errors->has('copyright') ? 'has-error' : '' }}">
                                                                    <label for="copyright">Copyright </label>
                                                                    <input type="text" name="copyright" id="copyright" value="{{ old('copyright', $setting->where('key', 'copyright')->first()->val) }}" class="form-control" placeholder="Enter Copyright" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group {{ $errors->has('copyright_link_text') ? 'has-error' : '' }}">
                                                                    <label for="copyright_link_text">Copyright Link Text</label>
                                                                    <input type="text" name="copyright_link_text" id="copyright_link_text" value="{{ old('copyright_link_text', $setting->where('key', 'copyright_link_text')->first()->val) }}" class="form-control" placeholder="Enter Copyright Link Text" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group {{ $errors->has('copyright_link') ? 'has-error' : '' }}">
                                                                    <label for="copyright_link">Copyright Link </label>
                                                                    <input type="url" name="copyright_link" id="copyright_link" value="{{ old('copyright_link', $setting->where('key', 'copyright_link')->first()->val) }}" class="form-control" placeholder="Enter Copyright Link" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="Download">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('app_store') ? 'has-error' : '' }}">
                                                                    <label for="app_store">AppStore</label>
                                                                    <input type="url" name="app_store" id="app_store" value="{{ old('app_store', $setting->where('key', 'app_store')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.app_store') }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group {{ $errors->has('play_store') ? 'has-error' : '' }}">
                                                                    <label for="play_store">PlayStore</label>
                                                                    <input type="url" name="play_store" id="play_store" value="{{ old('play_store', $setting->where('key', 'play_store')->first()->val) }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.play_store') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="API">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="access_key">{{ __('lang.access_key') }}</label>
                                                                <input readonly id="access_key" value="{{ old('access_key', $setting->where('key', 'access_key')->first()->val ?? '') }}" class="form-control dir_ltr_links" placeholder="{{ __('lang.enter') }} {{ __('lang.access_key') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @permission('update-settings')
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                                                        <a href="{{ route('dashboard') }}" class="btn default">{{ __('lang.cancel') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endpermission
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
