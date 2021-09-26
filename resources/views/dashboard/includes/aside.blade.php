<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li
                class="nav-item start {{ request()->is('dashboard.home') || request()->is('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">{{ __('lang.dashboard') }}</span>
                </a>
            </li>

            @permission('read-users')
            {{-- Start Featreus Link --}}
            <li class="nav-item {{ request()->routeIs('dashboard.users*') ? 'active open' : '' }}">
                <a href="{{ route('dashboard.users') }}" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ __('lang.users') }}</span>
                </a>
            </li>
            @endpermission
            {{-- Start Users Link --}}
            @permission('read-admins')
            <li class="nav-item {{ request()->routeIs('dashboard.admins*') || request()->routeIs('dashboard.roles*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">{{ __('lang.admins') }}</span>
                    <span class="arrow {{ request()->routeIs('dashboard.admins*') || request()->routeIs('dashboard.roles*') ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    @permission('read-roles')
                    <li class="nav-item {{ request()->routeIs('dashboard.roles*') ? 'active open' : '' }}">
                        <a href="{{ route('dashboard.roles') }}" class="nav-link">
                            <span class="title">{{ __('lang.roles') }}</span>
                        </a>
                    </li>
                    @endpermission

                    @permission('read-admins')
                    <li class="nav-item {{ request()->routeIs('dashboard.admins*') ? 'active open' : '' }}">
                        <a href="{{ route('dashboard.admins') }}" class="nav-link">
                            <span class="title">{{ __('lang.admins') }}</span>
                        </a>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission

            {{-- Start Regions Link --}}
            @permission('read-regions')
            <li class="nav-item {{ request()->routeIs('dashboard.regions*') ? 'active open' : '' }}">
                <a href="{{ route('dashboard.regions') }}" class="nav-link nav-toggle">
                    <i class="icon-directions"></i>
                    <span class="title">{{ __('lang.regions') }}</span>
                </a>
            </li>
            @endpermission

            {{-- Start Settings Link --}}
            @permission('read-settings')
            <li class="nav-item {{ request()->is('dashboard/setting*') ? 'active open' : '' }}">
                <a href="{{ route('dashboard.settings') }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('lang.setting') }}</span>
                </a>
            </li>
            @endpermission
        </ul>
    </div>
</div>
