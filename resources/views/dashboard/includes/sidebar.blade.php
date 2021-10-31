<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
                <a href="{{ route('dashboard.home') }}">
                    <i class="la la-mouse-pointer"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span>
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">
                    </i>
                    {{ __('dashboard/user.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item {{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.index') }}" class="nav-link ">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            <span class="menu-title" data-i18n="nav.dash.main">
                                المفعله
                            </span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{-- {{\App\Models\Visit::count()}} --}}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard.users.non-active') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.non-active') }}" class="nav-link ">
                            <i class="fa-fw fas fa-briefcase nav-icon">
                            </i>
                            الغير مفعله
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard.users.blocked') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.blocked') }}" class="nav-link ">
                            <i class="fa-fw fas fa-briefcase nav-icon">
                            </i>
                            المحظوره
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">
                    </i>
                    {{ __('dashboard/patient.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item {{ request()->routeIs('dashboard.users.index_patient') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.index_patient') }}" class="nav-link ">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            <span class="menu-title" data-i18n="nav.dash.main">
                                المفعله
                            </span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{-- {{\App\Models\Visit::count()}} --}}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard.users.non-active_patient') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.non-active_patient') }}" class="nav-link ">
                            <i class="fa-fw fas fa-briefcase nav-icon">
                            </i>
                            الغير مفعله
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard.users.blocked_patient') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.users.blocked_patient') }}" class="nav-link ">
                            <i class="fa-fw fas fa-briefcase nav-icon">
                            </i>
                            المحظوره
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ __('dashboard/user.PatientRequests') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item {{ request()->routeIs('dashboard.requests.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.requests.index') }}" class="nav-link ">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            <span class="menu-title" data-i18n="nav.dash.main">
                                المفعله
                            </span>
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{-- {{\App\Models\SubscriptionUserVisit::count()}} --}}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard.requests.non-active') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.requests.non-active') }}" class="nav-link ">
                            <i class="fa-fw fas fa-briefcase nav-icon">
                            </i>
                            الغير مفعله
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link  nav-dropdown-toggle {{ request()->routeIs('dashboard.trainingRequests.index') ? 'active' : '' }} " 
                    href="{{ route('dashboard.trainingRequests.index') }}">
                    <i class="fa-fw fas fa-users nav-icon"></i>
                    {{ __('front/request.title') }}
                </a>
            </li>

            <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
            <i class="fa-fw fas fa-users nav-icon">

            </i>
            إداره الصلاحيات
            </a>
            <ul class="nav-dropdown-items">

            <li class="nav-item {{request()->routeIs('dashboard.roles.*') ? 'active' : ''}}">
                <a href="{{route('dashboard.roles.index')}}" class="nav-link ">
                    <i class="fa-fw fas fa-briefcase nav-icon"></i>
                    {{__('dashboard/role.title')}}
                </a>
            </li>


            <li class="nav-item {{request()->routeIs('dashboard.permissions.*') ? 'active' : ''}}">
                <a href="{{ route('dashboard.permissions.index') }}" class="nav-link ">
                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                    {{__('dashboard/permission.title')}}
                </a>
            </li>

            
        </ul>
    </div>
</div>
