@extends('layouts.app')
@section('style')
{{--    <link href="{{asset('assets/front/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>--}}
<style>
    .bootstrap-select .dropdown-toggle .filter-option {
        display: flex;
        text-align: right;
        align-items: center;
    }
    .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
        width: 100%;
        height: 100%;
    }
    .bootstrap-select.show-menu-arrow.open>.dropdown-toggle, .bootstrap-select.show-menu-arrow.show>.dropdown-toggle {
        height: 100%;
    }
    .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
        width: 100%;
        height: 100%;
    }
    .btn:not(:disabled):not(.disabled) {
        height: inherit;
    }
    .bootstrap-select {
        text-align: right;
    }
    .dropdown-menu {
        text-align: right;
    }
</style>
@endsection
@section('content')
    <!-- Home Banner -->
        <section id="home" class="divider">
            <div class="container-fluid p-0">
                <!--- slider ---->
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('assets/front/img/slider/slider-1.jpg')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <span>We Provide Solution</span>
                                <h2>To stressless Life</h2>
                                <p>People who are more perfectionist are most likely to be depressed,<br>Because they stress themselves out so much.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/front/img/slider/slider-2.jpg')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <span>We Provide Solution</span>
                                <h2>Health Care Solution</h2>
                                <p>Every day we bring hope to millions of children in the world's<br> hardest places as a sign of God's unconditional love.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('assets/front/img/slider/slider-3.jpg')}}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <span>We Provide total</span>
                                <h2>Personalised care</h2>
                                <p>People who are more perfectionist are most likely to be depressed,<br>Because they stress themselves out so much.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--- /slider ---->
                <!-- Search -->
                <div class="banner-wrapper">
                    <div class="search-box search-box-3">
                        <form action="{{route('search')}}">
                            <div class="form-row row">
                                <div class="col-4">
                                    <div class="form-group form-focus">
                                        <select class="selectpicker show-menu-arrow  @error('interests') error @enderror"
                                                name="interests" id="interests" multiple
                                                title="????????????????????">
                                            <option>?????????????? ??????????????????</option>
                                            <option>?????????????? ????????????????</option>
                                            <option>?????????? ?????????????? ??????????????</option>
                                            <option>?????????????? ????????????????????????</option>
                                            <option>???????? ??????????</option>
                                            <option>?????????? ??????????</option>
                                            <option>???????? ??????????</option>
                                            <option>???????? ????????????</option>
                                            <option>?????????? ????????????</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group form-focus">
                                        <select class="selectpicker show-menu-arrow" name="gender" id="gender"
                                                multiple title="??????????">
                                            <option>{{__('front/global.male')}}</option>
                                            <option>{{__('front/global.female')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-focus">
                                        <select class="selectpicker show-menu-arrow" name="country" id="country"
                                                multiple title="??????????">
                                            <option> ?????? </option>
                                            <option> ???????????????? </option>
                                            <option> ???????????????? </option>
                                            <option> ???????????? </option>
                                            <option> ???????? </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group form-focus">
                                        <select class="selectpicker show-menu-arrow" name="city" id="city" title="??????????????">
                                            <option> ???????????? ???? ?????????? </option>
                                            <option> ???????????? </option>
                                            <option> ???????????? </option>
                                            <option> ???????????? ???? ???????????? </option>
                                            <option> ?????? </option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary search-btn btn-search mt-0 mr-2">
                                    <i class="fas fa-search"></i>  <span>??????</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Search -->
            </div>
        </section>
        <!-- /Home Banner -->

        <!-- Category Section -->
        <section class="section section-category mt-5">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Browse by Specialities</h2>
                    <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/1.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Urology</h4>
                                <span>21 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/2.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Neurology</h4>
                                <span>18 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/3.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Orthopedic</h4>
                                <span>17 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/4.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Cardiologist</h4>
                                <span>12 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/5.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Dentist</h4>
                                <span>07 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/1.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Urology</h4>
                                <span>16 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/4.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Cardiologist</h4>
                                <span>18 Doctors</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="{{asset('assets/front/img/category/3.png')}}" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Neurology</h4>
                                <span>22 Doctors</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category Section -->
        <!-- Popular Section -->
        <section class="section section-doctor">
            <div class="container-fluid">
                <div class="section-header text-center">
                    <h2>Book Our Best Doctor</h2>
                    <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doctor-slider slider">
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-01.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Ruby Perrin</a>
                                    </h3>
                                    <p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Florida, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-02.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <a href="doctor-profile.html">Darren Elder</a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>
                                    <p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(35)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $50 - $300 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-03.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Deborah Angel</a>
                                    </h3>
                                    <p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(27)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Georgia, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $100 - $400 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-04.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Sofia Brient</a>
                                    </h3>
                                    <p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(4)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Louisiana, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $150 - $250 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-05.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Marvin Campbell</a>
                                    </h3>
                                    <p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(66)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Michigan, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $50 - $700 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-06.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Katharine Berthold</a>
                                    </h3>
                                    <p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(52)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Texas, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $100 - $500 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-07.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Linda Tobin</a>
                                    </h3>
                                    <p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(43)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> Kansas, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $100 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" alt="User Image" src="{{asset('assets/front/img/doctors/doctor-08.jpg')}}">
                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn"> <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">Paul Richard</a>
                                    </h3>
                                    <p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
                                    <div class="rating"> <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(49)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li> <i class="fas fa-map-marker-alt"></i> California, USA</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i> $100 - $400 <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Doctor Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Popular Section -->
@endsection
@section('scripts')
{{--    <script src="{{asset('assets/front/plugins/select2/js/select2.min.js')}}"></script>--}}
    <script>
        // $('select').select2({
        //     insertTag: function (data, tag) {
        //         // Insert the tag at the end of the results
        //         data.push(tag);
        //     }
        // });
        $('select').selectpicker();
        //     $("#interests").select2({
        //         placeholder: "????????????????????",
        //         allowClear: true
        //     });
        // $("#gender").select2({
        //     placeholder: "??????????",
        //     allowClear: true
        // });
        // $("#city").select2({
        //     placeholder: "??????????????",
        //     allowClear: true
        // });
        // $("#country").select2({
        //     placeholder: "??????????",
        //     allowClear: true
        // });
    </script>

@endsection
