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
                <img src="{{asset('front/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{route('home')}}" class="menu-logo">
                    <img src="{{asset('front/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="has-submenu active">
                    <a href="{{route('home')}}">{{__('front/global.home')}}</a>
{{--                    <ul class="submenu">--}}
{{--                        <li class="active"><a href="{{route('index')}}">الرئيسيه</a></li>--}}
{{--                        <li><a href="{{route('index')}}">Home 1</a></li>--}}
{{--                        <li><a href="{{route('index-2')}}">Home 2</a></li>--}}
{{--                        <li><a href="{{route('index-3')}}">Home slider 1</a></li>--}}
{{--                        <li><a href="{{route('index-slide')}}">Home slider 2</a></li>--}}
{{--                    </ul>--}}
                </li>
                <li class="has-submenu"> <a href="#"> لقاءات</a>
                    <ul class="submenu">
                        <li><a href="{{route('doctor-dashboard')}}">Doctor Dashboard</a></li>
                        <li><a href="{{route('appointments')}}">Appointments</a></li>
                        <li><a href="{{route('schedule-timing')}}s">Schedule Timing</a></li>
                        <li><a href="{{route('my-patients')}}">Patients List</a></li>
                        <li><a href="{{route('patient-profile')}}">Patients Profile</a></li>
                        <li><a href="{{route('chat-doctor')}}">Chat</a></li>
                        <li><a href="{{route('invoices')}}">Invoices</a></li>
                        <li><a href="{{route('doctor-profile-settings')}}">Profile Settings</a></li>
                        <li><a href="{{route('reviews')}}">Reviews</a></li>
                        <li><a href="{{route('doctor-register')}}">Doctor Register</a></li>
                    </ul>
                </li>
                <li class="has-submenu mr-4"> <a href="#">من نحن</a>
                    <ul class="submenu">
                        <li class="has-submenu"> <a href="#">Doctors</a>
                            <ul class="submenu">
                                <li><a href="{{route('map-grid')}}">Map Grid</a>
                                </li>
                                <li><a href="{{route('map-list')}}">Map List</a>
                                </li>
                            </ul>
                        <li><a href="{{route('search')}}">Search Doctor</a></li>
                        <li><a href="{{route('doctor-profile')}}">Doctor Profile</a></li>
                        <li><a href="{{route('booking')}}">Booking</a></li>
                        <li><a href="{{route('checkout')}}">Checkout</a></li>
                        <li><a href="{{route('booking-success')}}">Booking Success</a></li>
                        <li><a href="{{route('patient-dashboard')}}">Patient Dashboard</a></li>
                        <li><a href="{{route('favourites')}}">Favourites</a></li>
                        <li><a href="{{route('chat')}}">Chat</a></li>
                        <li><a href="{{route('profile-settings')}}">Profile Settings</a></li>
                        <li><a href="{{route('change-password')}}">Change Password</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @if(auth()->user())
            <ul class="nav header-navbar-rht">
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                        <img class="rounded-circle" src="{{asset('front/assets/img/doctors/doctor-thumb-02.jpg')}}" width="31" alt="Darren Elder">
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
            {{--            <li class="login-link">--}}
            {{--                <a href="{{route('login')}}">تسجيل الدخول / تسجيل</a>--}}
            {{--            </li>--}}
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
