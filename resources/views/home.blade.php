@extends('layouts.app')
@section('style')
    {{-- <link href="{{asset('assets/front/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/> --}}
    <style>
        .bootstrap-select .dropdown-toggle .filter-option {
            display: flex;
            text-align: right;
            align-items: center;
        }

        .bootstrap-select>.dropdown-toggle.bs-placeholder,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
            width: 100%;
            height: 100%;
        }

        .bootstrap-select.show-menu-arrow.open>.dropdown-toggle,
        .bootstrap-select.show-menu-arrow.show>.dropdown-toggle {
            height: 100%;
        }

        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100%;
            height: 85%;
        }

        .filter-option {
            color: #44a08b;
        }

        .btn:not(:disabled):not(.disabled) {
            height: 85%;
        }

        .bootstrap-select {
            text-align: right;
        }

        .dropdown-menu {
            text-align: right;
        }

        .p_span {
            color: #24967f;
        }

    </style>
@endsection
@section('content')
    <!-- Home Banner -->
    <section id="home" class="divider">
        <div class="container-fluid p-0">
            <!--- slider ---->
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"
                data-interval="2500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('assets/front/img/slider/slider-1.jpg') }}"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <span>{{ __('front/global.We_Provide') }}</span>
                            <h2>{{ __('front/global.BestSolutionsToStresslessLife') }}</h2>
                            <p>{{ __('front/global.HomeReservTitle') }}
                                <br>{{ __('front/global.HomeReservTitle2') }}
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('assets/front/img/slider/slider-2.jpg') }}"
                            alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <span>{{ __('front/global.We_Provide') }}</span>
                            <h2>{{ __('front/global.BestSolutionsToStresslessLife') }}</h2>
                            <p>{{ __('front/global.HomeReservTitle') }}
                                <br>{{ __('front/global.HomeReservTitle2') }}
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('assets/front/img/slider/slider-3.jpg') }}"
                            alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <span>{{ __('front/global.We_Provide') }}</span>
                            <h2>{{ __('front/global.BestSolutionsToStresslessLife') }}</h2>
                            <p>{{ __('front/global.HomeReservTitle') }}
                                <br>{{ __('front/global.HomeReservTitle2') }}
                            </p>
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
                    <form action="{{ route('search') }}">
                        <div class="form-row row">
                            <div class="col-4">
                                <div class="form-group form-focus">
                                    <select class="selectpicker show-menu-arrow  @error('interests') error @enderror"
                                        name="interests" id="interests" multiple title="الإهتمامات">
                                        <option>التغذيه الأنبوبيه</option>
                                        <option>التغذيه الوريديه</option>
                                        <option>عمليه التقييم الغذائي</option>
                                        <option>الأمراض اللإستقلالبه</option>
                                        <option>سمنه اطفال</option>
                                        <option>نحافه اطفال</option>
                                        <option>سكري اطفال</option>
                                        <option>سمنه بالغين</option>
                                        <option>نحافه بالغين</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group form-focus">
                                    <select class="selectpicker show-menu-arrow" name="gender" id="gender" multiple
                                        title="النوع">
                                        <option>{{ __('front/global.male') }}</option>
                                        <option>{{ __('front/global.female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group form-focus">
                                    <select class="selectpicker show-menu-arrow" name="country" id="country" multiple
                                        title="البلد">
                                        <option> مصر </option>
                                        <option> السعوديه </option>
                                        <option> الإمارات </option>
                                        <option> الأردن </option>
                                        <option> عمان </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group form-focus">
                                    <select class="selectpicker show-menu-arrow" name="city" id="city" title="المدينة">
                                        <option> العاشر من رمضان </option>
                                        <option> العبور </option>
                                        <option> الشروق </option>
                                        <option> السادس من اكتوبر </option>
                                        <option> بدر </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary search-btn btn-search mt-0 mr-2">
                                <i class="fas fa-search"></i> <span>بحث</span>
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
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-lg-3">
                        <a href="{{ route('search_by_category', [$item->id]) }}">
                            <div class="category-box">

                                <div class="category-image">
                                    <img src="{{ asset(@$item->photo) }}" alt="">
                                </div>

                                <div class="category-content">
                                    <h4>{{ $item->name }}</h4>
                                    <span class="p_span">{{ $item->user_count }} Doctors</span>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- Category Section -->
    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="section-header text-center">
                <h2>Book Our Best Doctor</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="doctor-slider slider">
                        @foreach ($doctors_favourites as $item)
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ route('doctor-patient-profile', [$item->id]) }}">
                                        <img class="img-fluid" alt="User Image" src="{{ asset($item->photo) }}">
                                    </a>
                                    <a href="{{ route('check_favourite', [$item->id]) }}" class="fav-btn"> <i
                                            class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content text-right">
                                    <h3 class="title">
                                        <i class="fas fa-check-circle verified"></i>
                                        <a href="doctor-profile.html">{{ $item->name }}</a>
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
                                        <li> <i class="fas fa-map-marker-alt"></i> {{ $item->doctorProfile->city }},
                                            {{ $item->doctorProfile->country }}</li>
                                        <li> <i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
                                        <li> <i class="far fa-money-bill-alt"></i>
                                            {{ $item->doctorProfile->follow_up_fee }} <i class="fas fa-info-circle"
                                                data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6"> <a
                                                href="{{ route('doctor-patient-profile', [$item->id]) }}"
                                                class="btn view-btn">View
                                                Profile</a>
                                        </div>
                                        <div class="col-6"> <a href="{{ route('booking', [$item->id]) }}"
                                                class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->
@endsection
@section('scripts')
    {{-- <script src="{{asset('assets/front/plugins/select2/js/select2.min.js')}}"></script> --}}
    <script>
        // $('select').select2({
        //     insertTag: function (data, tag) {
        //         // Insert the tag at the end of the results
        //         data.push(tag);
        //     }
        // });
        $('select').selectpicker();
        //     $("#interests").select2({
        //         placeholder: "الإهتمامات",
        //         allowClear: true
        //     });
        // $("#gender").select2({
        //     placeholder: "النوع",
        //     allowClear: true
        // });
        // $("#city").select2({
        //     placeholder: "المدينه",
        //     allowClear: true
        // });
        // $("#country").select2({
        //     placeholder: "البلد",
        //     allowClear: true
        // });
    </script>

@endsection
