 <!-- Profile Sidebar -->
 <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{Auth::user()->photo}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{Auth::user()->name}}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i>{{date('Y-m-d', strtotime(Auth::user()->birthdate))}} ,{{date_diff(new \DateTime(Auth::user()->birthdate), new \DateTime())->format("%y Years")}}</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="{{route('patient_dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('favourites')}}">
                            <i class="fas fa-bookmark"></i>
                            <span>Favourites</span>
                        </a>
                    </li>
                    <li>
                        <a href="dependent.html">
                            <i class="fas fa-users"></i>
                            <span>Dependent</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('chat')}}">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile-settings')}}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="change-password.html">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="home.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
<!-- / Profile Sidebar -->
