<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
           <span class="app-brand-logo demo">
               <img src="{{asset(getConfigTableData()?->logo)}}" class="img-fluid">
           </span>
            <span class="app-brand-text demo menu-text fw-bold fs-6">{{getConfigTableData()?->company_name}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        @foreach(modules() as $module)
            @if (hasPermissionOnModule($module))
                @if ($module['hasSubmodules'])
                    <li class="menu-item
                        @foreach ($module['routeIndexNameMultipleSubMenu']??[] as $rawRouteName)
                            @if (str_contains(url()->current(), route($rawRouteName)))
                                open
                           @endif
                        @endforeach
                    ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            {!! $module['icon'] !!}
                            <div>&nbsp; {{__($module['name'])}}</div>
                        </a>
                        <ul class="menu-sub">
                            @foreach ($module['submodules'] as $subModule)
                                @if(hasPermission('/'.$subModule['routeName']))
                                    <li class="menu-item @if (str_contains(url()->current(),route($subModule['routeIndexName']))) active @endif">
                                        <a href="{{ route($subModule['routeIndexName']) }}" class="menu-link">
                                            <div>{{__($subModule['name'])}}</div>
                                        </a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </li>

                @else
                    <li class="menu-item @if (str_contains(url()->current(),route($module['routeIndexName']))) active @endif">
                        <a href="{{route($module['routeIndexName'])}}" class="menu-link">
                            {!! $module['icon'] !!}
                            <div>&nbsp; {{__($module['name'])}}</div>
                        </a>
                    </li>
                @endif
            @endif
        @endforeach

        {{--        <li class="menu-item @if (str_contains(url()->current(),route('configs.index'))) open @endif">--}}
        {{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
        {{--                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>--}}
        {{--                <div>{{ __('Settings') }}</div>--}}
        {{--            </a>--}}
        {{--            <ul class="menu-sub">--}}
        {{--                <li class="menu-item @if (str_contains(url()->current(),route('configs.index'))) active @endif">--}}
        {{--                    <a href="{{ route('configs.index') }}" class="menu-link">--}}
        {{--                        <div>{{ __('Configs') }}</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}

        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        <li class="menu-item @if (str_contains(url()->current(),route('users.index'))) open @endif">--}}
        {{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
        {{--                <i class="menu-icon tf-icons ti ti-users"></i>--}}
        {{--                <div>{{ __('User Management') }}</div>--}}
        {{--            </a>--}}
        {{--            <ul class="menu-sub">--}}
        {{--                <li class="menu-item @if (str_contains(url()->current(),route('users.index'))) active @endif">--}}
        {{--                    <a href="{{ route('users.index') }}" class="menu-link">--}}
        {{--                        <div>{{ __('Users') }}</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="menu-item @if (str_contains(url()->current(),route('roles.index'))) active @endif">--}}
        {{--                    <a href="{{ route('roles.index') }}" class="menu-link">--}}
        {{--                        <div>{{ __('Roles') }}</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </li>--}}
    </ul>
</aside>
