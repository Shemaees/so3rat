<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                        <span></span>
                        <span></span>
                        </span>
            </a>
            <a href="{{route('index')}}" class="navbar-brand logo">
                <img src="{{asset('front/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{route('index')}}" class="menu-logo">
                    <img src="{{asset('front/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="has-submenu active">
                    <a href="#">Home <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="active"><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('index')}}">Home 1</a></li>
                        <li><a href="{{route('index-2')}}">Home 2</a></li>
                        <li><a href="{{route('index-3')}}">Home slider 1</a></li>
                        <li><a href="{{route('index-slide')}}">Home slider 2</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{route('doctor-dashboard')}}">Doctor Dashboard</a></li>
                        <li><a href="{{route('appointments')}}">Appointments</a></li>
                        <li><a href="{{route('schedule-timings')}}">Schedule Timing</a></li>
                        <li><a href="{{route('my-patients')}}">Patients List</a></li>
                        <li><a href="{{route('patient-profile')}}">Patients Profile</a></li>
                        <li><a href="{{route('chat-doctor')}}">Chat</a></li>
                        <li><a href="{{route('invoices')}}">Invoices</a></li>
                        <li><a href="{{route('doctor-profile-settings')}}">Profile Settings</a></li>
                        <li><a href="{{route('reviews')}}">Reviews</a></li>
                        <li><a href="{{route('doctor-register')}}">Doctor Register</a></li>
                        <li class="has-submenu">
                            <a href="{{route('doctor-blog')}}">Blog</a>
                            <ul class="submenu">
                                <li><a href="{{route('doctor-blog')}}">Blog</a></li>
                                <li><a href="{{route('blog-details')}}">Blog view</a></li>
                                <li><a href="{{route('doctor-add-blog')}}">Add Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Doctors</a>
                            <ul class="submenu">
                                <li><a href="{{route('map-grid')}}">Map Grid</a></li>
                                <li><a href="{{route('map-list')}}">Map List</a></li>
                            </ul>
                        </li>
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
                <li class="has-submenu">
                    <a href="#">Pharmacy <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{route('pharmacy-index')}}">Pharmacy</a></li>
                        <li><a href="{{route('pharmacy-details')}}">Pharmacy Details</a></li>
                        <li><a href="{{route('pharmacy-search')}}">Pharmacy Search</a></li>
                        <li><a href="{{route('product-all')}}">Product</a></li>
                        <li><a href="{{route('product-description')}}">Product Description</a></li>
                        <li><a href="{{route('cart')}}">Cart</a></li>
                        <li><a href="{{route('product-checkout')}}">Product Checkout</a></li>
                        <li><a href="{{route('payment-success')}}">Payment Success</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="voice-call.html">Voice Call</a></li>
                        <li><a href="video-call.html">Video Call</a></li>
                        <li><a href="{{route('search')}}">Search Doctors</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="components.html">Components</a></li>
                        <li class="has-submenu">
                            <a href="{{route('invoices')}}">Invoices</a>
                            <ul class="submenu">
                                <li><a href="{{route('invoices')}}">Invoices</a></li>
                                <li><a href="{{route('invoice-view')}}">Invoice View</a></li>
                            </ul>
                        </li>
                        <li><a href="blank-page.html">Starter Page</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        <li><a href="{{route('forget-password')}}">Forgot Password</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">Blog <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{route('blog-list')}}">Blog List</a></li>
                        <li><a href="{{route('blog-grid')}}">Blog Grid</a></li>
                        <li><a href="{{route('blog-details')}}">Blog Details</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#" target="_blank">Admin <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="admin/index.html" target="_blank">Admin</a></li>
                        <li><a href="pharmacy/index.html" target="_blank">Pharmacy Admin</a></li>
                    </ul>
                </li>
                <li class="login-link">
                    <a href="login.html">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link header-login" href="login.html">login / Signup </a>
            </li>
        </ul>
    </nav>
</header>
