<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{asset('assets/front/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. Darren Elder</h3>

                <div class="patient-details">
                    <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li>
                    <a href="{{route('doctor-dashboard')}}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('appointments')}}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('my-patients')}}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('schedule-timing')}}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('invoices')}}">
                        <i class="fas fa-file-invoice"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('reviews')}}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('chat-doctor')}}">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li>
                <li>
                    <a href="{{route('doctor-profile-settings')}}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{route('social-media')}}">--}}
{{--                        <i class="fas fa-share-alt"></i>--}}
{{--                        <span>Social Media</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="active">
                    <a href="{{route('doctor-change-password')}}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
