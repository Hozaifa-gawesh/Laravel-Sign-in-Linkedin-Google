<div class="profile-sidebar sidebar_profile">
    <div class="portlet mb-0 light profile-sidebar-portlet usersDisplayInfo">
        <div class="content_userDis">
            <div class="profile-userpic open_img">
                <a href="{{ $data->image ? asset($data->image) : asset('images/user.png') }}" title="{{ __('lang.personal_image') }}">
                    <img src="{{ $data->image ? asset($data->image) : asset('images/user.png') }}" class="img-responsive" alt="{{ $data->username }}">
                </a>
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"> {{ $data->username }} </div>
                @permission('update-users')
                    <a href="{{ route('dashboard.users.edit', $data->id) }}" title="{{ __('lang.edit') }}" class="btn btn-circle btn-info btn-sm"><i class="fa fa-edit"></i> {{ __('lang.edit') }}</a>
                @endpermission
            </div>
            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="{{ Request::routeIs('dashboard.users.view', $data->id) ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.view', $data->id) }}">
                            <i class="icon-user"></i> {{ __('lang.account') }}
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard.users.addresses*') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.addresses', $data->id) }}">
                            <i class="icon-pointer"></i> {{ __('lang.shipping_addresses') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<form id="delete-form" style="display:none;" method="post">@csrf</form>

@section('css')
    <link href="{{ asset('admin/assets') }}/css/magnific-popup.css" rel="stylesheet" type="text/css" />
@stop
@section('js')
    <script src="{{ asset('admin/assets') }}/js/jquery.magnific-popup.min.js"></script>
@stop