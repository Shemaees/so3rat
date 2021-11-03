
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

        .carousel-inner {
            height: 150px;
        }
        .search-box-3 {
            background: #edededcc;
            padding: 3px;
            padding-right: 11px;
            border-radius: 10px;
            margin-top: -96px;
            position: absolute;
            right: 0;
            left: 0;
            width: 79%;
            margin-left: auto;
            margin-right: auto;
        }
        .search-box .form-group {
            margin-bottom: -15px !important;
            /* margin-top: 7px; */
        }
    </style>
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

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('assets/front/img/slider/slider-2.jpg') }}"
                            alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('assets/front/img/slider/slider-3.jpg') }}"
                            alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">

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
                            <div class="col-4 m-0 p-0">
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
                            <div class="col-2 m-0 p-0">
                                <div class="form-group form-focus">
                                    <select class="selectpicker show-menu-arrow" name="gender" id="gender" multiple
                                        title="النوع">
                                        <option>{{ __('front/global.male') }}</option>
                                        <option>{{ __('front/global.female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 m-0 p-0">
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
                            <div class="col-2 m-0 p-0">
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

