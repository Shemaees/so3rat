<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);"> <span class="bar-icon">
                            <span></span>
                        <span></span>
                        <span></span>
                        </span>
            </a>
            <a href="{{route('home')}}" class="navbar-brand logo">
                <img src="{{asset('assets/front/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{route('home')}}" class="menu-logo">
                    <img src="{{asset('assets/front/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i>
                </a>
            </div>
            @php
                $user = Auth::user();
            @endphp
            <ul class="main-nav text-right">

                <li class="has-submenu active">
                    <a href="{{route('home')}}">{{__('front/global.home')}}</a>
                </li>

                <li class="has-submenu"> <a href="{{route('meetings')}}"> {{ __('front/global.Meetings') }}</a>
                </li>


                <li class="has-submenu mr-4"> <a href="#">{{ __('front/global.whoAreWe') }}</a>
                    <ul class="submenu">
                        <li class="has-submenu"> <a href="#" class="mr-3 ml-3">{{__('front/global.Doctors')}}</a>
                            <ul class="submenu">
                                <li><a href="{{route('map-grid')}}">{{__('front/global.MapGrid')}}</a>
                                </li>
                                <li><a href="{{route('map-list')}}">{{__('front/global.MapList')}}</a>
                                </li>
                            </ul>

                        <li><a href="{{route('search')}}">{{__('front/global.SearchDoctor')}}</a></li>
                        @if($user)
                        <li><a href="{{route('checkout')}}">{{__('front/global.Checkout')}}</a></li>
                        {{-- <li><a href="{{route('booking-success')}}">{{__('front/global.BookingSuccess')}}</a></li> --}}

                        @if( $user->user_type=='Patient')
                        <li><a href="{{route('patient_dashboard')}}">{{__('front/global.PatientDashboard')}}</a></li>
                        <li><a href="{{route('favourites')}}">{{__('front/global.Favourites')}}</a></li>
                        <li><a href="{{route('profile-settings')}}">{{__('front/global.ProfileSettings')}}</a></li>
                        <li><a href="{{route('chat')}}">{{__('front/global.Chat')}}</a></li>
                        @endif
                        <li><a href="{{route('change-password')}}">{{__('front/global.ChangePassword')}}</a></li>
                        @endif
                        <li><a href="{{route('reviews')}}">{{__('front/global.Reviews')}}</a></li>

                        @if($user && $user->user_type == 'Doctor')

                        <li><a href="{{route('doctor-profile')}}">{{__('front/global.DoctorProfile')}}</a></li>
                        <li><a href="{{route('schedule-timing')}}s">{{__('front/global.ScheduleTiming')}}</a></li>
                        <li><a href="{{route('my-patients')}}">{{__('front/global.PatientsList')}}</a></li>
                        <li><a href="{{route('invoices')}}">{{__('front/global.Invoices')}}</a></li>
                        <li><a href="{{route('chat-doctor')}}">{{__('front/global.Chat')}}</a></li>
                        @elseif(!$user)
                        <li><a href="{{route('register')}}">{{__('front/global.Register')}}</a></li>
                        <!-- <li><a href="{{route('doctor-register')}}">{{__('front/global.DoctorRegister')}}</a></li> -->
                        @endif

                    </ul>
                </li>

                <li class="has-submenu mr-4"> <a href="{{route('contactus')}}"> اتصل بنا</a></li>
            </ul>
        </div>
        @if(auth()->user())
            <ul class="nav header-navbar-rht">
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                        <img class="rounded-circle" src="{{asset('assets/front/img/doctors/doctor-thumb-02.jpg')}}" width="31" alt="Darren Elder">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left"><a class="dropdown-item" href="{{route('doctor-dashboard')}}">
                            <i class="ft-user"></i>
                            الملف الشحصي
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="ft-power"></i>
                            تسجيل الخروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        @else

            <ul class="nav header-navbar-rht">
                <li class="nav-item contact-item">
                    <div class="header-contact-img"> <i class="far fa-hospital"></i>
                    </div>
                    <div class="header-contact-detail">
                        <p class="contact-header">Contact</p>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link header-login" href="{{route('login')}}">تسجيل الدخول / تسجيل </a>
                </li>
            </ul>
        @endif
    </nav>
</header>
<!-- /Header -->
