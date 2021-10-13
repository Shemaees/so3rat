@extends('layouts.userLogin')
@section('styles')
    <link href="{{asset('front/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('front/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color : #249680;
            /*background-image: linear-gradient(120deg,#249680, #81D4FA)*/
        }

        #add-user-form {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #add-user-form fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #add-user-form fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #add-user-form fieldset:not(:first-of-type) {
            display: none
        }

        #add-user-form fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #add-user-form input,
        #add-user-form textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #add-user-form input:focus,
        #add-user-form textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid #249680;
            outline-width: 0
        }

        #add-user-form .action-button {
            width: 100px;
            background: #249680;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #add-user-form .action-button:hover,
        #add-user-form .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #249680
        }

        #add-user-form .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #add-user-form .action-button-previous:hover,
        #add-user-form .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid #249680
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #doctor:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #doctor-trainer:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #doctor-follow-up:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #patient:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #249680
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: #249680;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
        .select2-container {
            width: 100% !important;;
        }
    </style>
@endsection
@section('content')
<!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Sign Up Your User Account</strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="add-user-form">
{{--                                @csrf--}}
                                <!-- progressbar -->
{{--                                <ul id="progressbar" class="d-flex justify-content-center">--}}
{{--                                    <li class="active" id="account"><strong> معلومات عامة</strong></li>--}}
{{--                                    <li id="complete" class=""><strong>التكملة</strong></li>--}}
{{--                                    <li id="patient" class="d-none"><strong>معلومات المريض</strong></li>--}}
{{--                                    <li id="doctor" class="d-none"><strong>معلومات الإخصائي</strong></li>--}}
{{--                                    <li id="confirm"><strong>تم</strong></li>--}}
{{--                                </ul>--}}
                                <!-- fieldsets -->
                                    <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">{{__('front/global.account_info')}}</h2>
                                        <div class="change-avatar">
                                            <div class="upload-img col-6 pt-5">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload pl-2"></i>تحميل صورة</span>
                                                    <input type="file" class="upload" onchange="readURL(this);" name="photo" >
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                            <div class="profile-img col-6">
                                                <img id="output" class="pb-3">
                                            </div>
                                        </div>
                                        <div class="form-group form-focus d-flex">
                                            <div class="col-6">
                                                <select class="form-control" name="type" id="type" >
                                                    <option value="" disabled selected>اختر نوع المستخدم</option>
                                                    <option value="Patient"> {{__('front/patient.title')}} </option>
                                                    <option value="Doctor"> {{__('front/doctor.title')}} </option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control" name="gender" id="gender" >
                                                    <option value="" disabled selected>{{__('front/global.gender')}}</option>
                                                    <option value="patient"> {{__('front/global.male')}} </option>
                                                    <option value="doctor"> {{__('front/global.female')}} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="text" name="uname" placeholder="اسم المستخدم"  />
                                        <input type="email" name="email" placeholder="البريد الإلكتروني" />
                                        <input type="password" name="pwd" placeholder="كلمه السر" />
                                        <input type="password" name="cpwd" placeholder="تأكيد كلمه السر" />
                                        <div class="form-group form-focus d-flex">
                                            <div class="col-6">
                                                <input type="tel" name="phone" id="phone" placeholder="رقم التليفون" />
                                            </div>
                                            <div class="col-6">
                                                <input type="date" name="birthdate" id="bithdate" placeholder="تاريخ الميلاد" />
                                            </div>
                                        </div>
                                    </div>
{{--                                    <input type="button" name="next" class="next action-button" value="{{__('front/global.next')}}" />--}}
{{--                                        <button type="submit">{{__('front/global.confirm')}}</button>--}}
                                    </fieldset>

                                <div class="" id="patient-form">
                                    <fieldset >
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">{{__('front/patient.info')}}</h2>
                                        <div class="col-12 d-flex">
                                            <div class="form-group col-6">
                                                <label class="float-right">الطول(سم)</label>
                                                <input type="number" step="0.01" class="form-control" name="length" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">الوزن(كجم)</label>
                                                <input type="number" step="0.01" class="form-control" name="weight" >
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex">
                                            <div class="form-group form-focus col-6 ">
                                                <select class="form-control" name="history" id="history" style="width:50%"  multiple="multiple" >
                                                    <option value="ارتفاع ضغط الدم">ارتفاع ضغط الدم </option>
                                                    <option value="امراض السكري"> امراض السكري </option>
                                                    <option value="السمنة"> السمنة </option>
                                                    <option value="اسهال"> اسهال </option>
                                                    <option value="امساك"> امساك </option>
                                                    <option value="قيء"> قيء </option>
                                                    <option value="غثيان">غثيان</option>
                                                    <option value="صعوبة بالمضغ "> صعوبة بالمضغ </option>
                                                    <option value="صعوبة بالبلع"> صعوبة بالبلع </option>
                                                    <option value="no_data"> لا يوجد </option>
                                                    <option value="other"> اخري </option>
                                                </select>
                                            </div>
                                            <div id="ifYes" class="col-6 d-none">
                                                <input type="text" id="car" name="car"  placeholder="{{__('front/global.history')}}" /><br/>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="col-6">
                                                <select class="form-control" name="usual_medicines" id="usual_medicines" >
                                                    <option value="" disabled selected>هل يتم تناول اي نوع من الأدويه؟</option>
                                                    <option value="yes">نعم </option>
                                                    <option value="no"> لا </option>
                                                </select>
                                            </div>
                                            <div class="col-6 d-none" id="medicines">
                                                <input type="text" name="usual_medicines" placeholder=" حدد نوع الأدويه" />
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="col-6">
                                                <select class="form-control" name="allergenic_foods" id="allergenic_foods" >
                                                    <option value="" disabled selected>هل لديك أطعمة معينه تسبب الحساسية؟</option>
                                                    <option value="yes">نعم </option>
                                                    <option value="no"> لا </option>
                                                </select>
                                            </div>
                                            <div class="col-6 d-none" id="foods">
                                                <input type="text" name="allergenic_foods" placeholder=" حدد نوع الأطعمة" />
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-4">
                                                <label class="float-right">اعلي وزن حصلت عليه؟</label>
                                                <input type="number" step="0.01" class="form-control" name="about_wieght" >
                                            </div>
                                            <div class="form-group col-4">
                                                <label class="float-right">اقل وزن حصلت عليه؟</label>
                                                <input type="number" step="0.01" class="form-control" name="about_wieght" >
                                            </div>
                                            <div class="form-group col-4">
                                                <label class="float-right">الوزن المعتاد</label>
                                                <input type="number" step="0.01" class="form-control" name="about_wieght" >
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">نمط الحياه</h2>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.meals_number')}}</label>
                                                <input type="number"  class="form-control" name="meals_number" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.meals_order')}}</label>
                                                <input type="text" class="form-control" name="meals_order" >
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.average_sleeping_hours')}}</label>
                                                <input type="number"  class="form-control" name="average_sleeping_hours" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.cups_of_water_daily')}}</label>
                                                <input type="number" class="form-control" name="cups_of_water_daily" placeholder="كوب(240ملي)" >
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">النشاط الرياضي</h2>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.sport_activities')}}</label>
                                                <select class="form-control" name="allergenic_foods" id="allergenic_foods" >
{{--                                                    <option value="" disabled selected>هل لديك أطعمة معينه تسبب الحساسية؟</option>--}}
                                                    <option value="1.2">خامل 1.2 : لا تمارين - اعمال مكتبية  </option>
                                                    <option value="1.375"> نشاط خفيف 1.375 : 20 دقيقع رياضه خفيفة / نمارين , 1-3 ايام بالاسبوع مثل المشي ,ركوب الدراجه أو الجري </option>
                                                    <option value="1.55">نشاط متوسط 1.55 : 30-60 دقيقة رياضة متوسطة / تمارين , 3-5 ايام بالأسبوع  </option>
                                                    <option value="1.725">نشاط عالي 1.725 : 60 دقيقة رياضه عنيفة / تمارين , 5-7 ايام بالأسبوع  </option>
                                                </select>
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">العادات الغذائية</h2>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.favorite_meals')}}</label>
                                                <input type="text"  class="form-control" name="favorite_meals" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.unfavorite_meals')}}</label>
                                                <input type="text" class="form-control" name="unfavorite_meals" >
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">الأطعمة المفضلة والغير مفضلة</h2>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.carbohydrates')}}</label>
                                                <input type="text"  class="form-control" name="carbohydrates_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="carbohydrates_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.vegetables')}}</label>
                                                <input type="text"  class="form-control" name="vegetables_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="vegetables_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.fruits')}}</label>
                                                <input type="text"  class="form-control" name="fruits_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="fruits_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.dairy_products')}}</label>
                                                <input type="text"  class="form-control" name="dairy_products_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="dairy_products_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex pt-3">
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.meat')}}</label>
                                                <input type="text"  class="form-control" name="meat_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="meat_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="float-right">{{__('front/patient.fats')}}</label>
                                                <input type="text"  class="form-control" name="fats_favorite" placeholder="المفضلة" >
                                                <input type="text"  class="form-control" name="fats_unFavorite" placeholder="الغير مفضلة" >
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">الأسئلة العامة</h2>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.health_goal')}}</label>
                                                <textarea class="form-control" name="health_goal" ></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.motivation')}}</label>
                                                <textarea class="form-control" name="motivation" ></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.confidence')}}</label>
                                                <textarea class="form-control" name="confidence" ></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.nutritionists_number_worked_with_before')}}</label>
                                                <textarea class="form-control" name="nutritionists_number_worked_with_before" ></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/patient.lost_weight_without_planning_or_knowing_reasons')}}</label>
                                                <textarea class="form-control" name="lost_weight_without_planning_or_knowing_reasons" ></textarea>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <input type="button" name="previous" class="previous action-button-previous" value="{{__('front/global.previous')}}" />--}}
{{--                                    <input type="button" name="next" class="next action-button" value="{{__('front/global.next')}}" />--}}
                                        <button type="submit" class="action-button">{{__('front/global.confirm')}}</button>
                                    </fieldset>
                                </div>

                                <div class="" id="doctor-form">
                                    <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">معلومات الإخصائي</h2>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-6 " >
                                                <label class="float-right">{{__('front/doctor.country')}}</label>
                                                <input type="text" class="form-control" name="country" >
                                            </div>
                                            <div class="form-group col-6 " >
                                                <label class="float-right">{{__('front/doctor.city')}}</label>
                                                <input type="text" class="form-control" name="city">
                                            </div>
                                        </div>
                                        <div class="d-flex pt-3">
                                            <div class="form-group col-12">
                                                <label class="float-right">{{__('front/doctor.doctor_type')}}</label>
                                                <select class="form-control" name="doctor_type" id="doctor_type" >
                                                    <option value="" disabled selected>{{__('front/doctor.doctor_type')}}</option>
                                                    <option value="Follow up of patients"> متابعه مرضي</option>
                                                    <option value="Trainer">تدريب اخصائي  </option>
                                                    <option value="Trainee"> متدرب</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-none" id="patients">
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-12" >
                                                    <label class="float-right">{{__('front/doctor.about')}}</label>
                                                    <textarea class="form-control" name="about"></textarea>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-12 " >
                                                    <label class="float-right">{{__('front/doctor.intrests')}}</label>
                                                    <select class="form-control" name="intrests" id="intrests"  multiple="multiple">
                                                        <option value="" disabled selected>{{__('front/doctor.doctor_type')}}</option>
                                                        <option value="التغذيه الأنبوبيه">التغذيه الأنبوبيه</option>
                                                        <option value="التغذيه الوريديه">التغذيه الوريديه</option>
                                                        <option value="عمليه التقييم الغذائي">عمليه التقييم الغذائي</option>
                                                        <option value="الأمراض اللإستقلالبه">الأمراض اللإستقلالبه</option>
                                                        <option value="سمنه اطفال">سمنه اطفال</option>
                                                        <option value="نحافه اطفال">نحافه اطفال</option>
                                                        <option value="سكري اطفال">سكري اطفال</option>
                                                        <option value="سمنه بالغين">سمنه بالغين</option>
                                                        <option value="نحافه بالغين">نحافه بالغين</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-6" >
                                                    <label class="float-right">{{__('front/doctor.communication_way')}}</label>
                                                    <select class="form-control" name="communication_way" id="communication_way" >
                                                        <option value="" disabled selected>{{__('front/doctor.communication_way')}}</option>
                                                        <option value="Private">شخصي</option>
                                                        <option value="Group">مجموعات الدعم</option>
                                                        <option value="Both">هما معا</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 " >
                                                    <label class="float-right">{{__('front/doctor.accept_promotions')}}</label>
                                                    <select class="form-control" name="accept_promotions" id="accept_promotions" >
                                                        <option value="" disabled selected>{{__('front/doctor.accept_promotions')}}</option>
                                                        <option value="Yes">نعم</option>
                                                        <option value="No">لا</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-6 " >
                                                    <label class="float-right">{{__('front/doctor.follow_up_fee')}}</label>
                                                    <input type="number" class="form-control" name=follow_up_fee">
                                                </div>
                                                <div class="form-group col-6 " >
                                                    <label class="float-right">{{__('front/doctor.training_fee')}}</label>
                                                    <input type="number" class="form-control" name="training_fee">
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3 col-12">
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.classification_certificate')}}</span>
                                                            <input type="file" class="upload" name="classification_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.bank_statements_certificate')}}</span>
                                                            <input type="file" class="upload" name="bank_statements_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>شهادة {{__('front/doctor.university_qualification')}} </span>
                                                            <input type="file" class="upload" name="university_qualification">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none" id="trainer">
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-12" >
                                                    <label class="float-right">{{__('front/doctor.about')}}</label>
                                                    <textarea class="form-control" name="about"></textarea>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-12 " >
                                                    <label class="float-right">{{__('front/doctor.intrests')}}</label>
                                                    <select class="form-control" name="intrests" id="intrests"  multiple="multiple">
                                                        <option value="" disabled selected>{{__('front/doctor.doctor_type')}}</option>
                                                        <option value="التغذيه الأنبوبيه">التغذيه الأنبوبيه</option>
                                                        <option value="التغذيه الوريديه">التغذيه الوريديه</option>
                                                        <option value="عمليه التقييم الغذائي">عمليه التقييم الغذائي</option>
                                                        <option value="الأمراض اللإستقلالبه">الأمراض اللإستقلالبه</option>
                                                        <option value="سمنه اطفال">سمنه اطفال</option>
                                                        <option value="نحافه اطفال">نحافه اطفال</option>
                                                        <option value="سكري اطفال">سكري اطفال</option>
                                                        <option value="سمنه بالغين">سمنه بالغين</option>
                                                        <option value="نحافه بالغين">نحافه بالغين</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="form-group col-6 " >
                                                    <label class="float-right">{{__('front/doctor.medical_license_number')}}</label>
                                                    <input type="number" class="form-control" name="medical_license_number">
                                                </div>
                                                <div class="form-group col-6 " >
                                                    <label class="float-right">{{__('front/doctor.training_fee')}}</label>
                                                    <input type="number" class="form-control" name="training_fee">
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3 col-12">
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.classification_certificate')}}</span>
                                                            <input type="file" class="upload" name="classification_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.bank_statements_certificate')}}</span>
                                                            <input type="file" class="upload" name="bank_statements_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.experience_certificate')}}</span>
                                                            <input type="file" class="upload" name="university_experience_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3 col-12">
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.university_qualification')}}</span>
                                                            <input type="file" class="upload" name="university_qualification">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.specialty_certificate')}}</span>
                                                            <input type="file" class="upload" name="specialty_certificate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="change-avatar">
                                                    <div class="upload-img col-4 pt-5">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload pl-2"></i>{{__('front/doctor.training_program')}}</span>
                                                            <input type="file" class="upload" name="training_program">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="fs-title text-center">{{__('front/doctor.degree')}}</h2>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="education-info">
                                                    <div class="row form-row education-cont">
                                                        <div class="col-12 col-md-10 col-lg-11">
                                                            <div class="row form-row">
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>الدرجه العلمية</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>التخصص</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>المنشئه العلميه</label>
                                                                        <input type="text" class="form-control" name="university_qualification">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-more">
                                                    <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> إضافة</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
{{--                                    <input type="button" name="previous" class="previous action-button-previous" value="{{__('front/global.previous')}}" />--}}
{{--                                    <input type="submit" name="make_payment" class="next action-button" value="{{__('front/global.confirm')}}" />--}}
                                    <button type="submit" class="action-button">{{__('front/global.confirm')}}</button>
                                </fieldset>
                                </div>

{{--                                <fieldset>--}}
{{--                                    <div class="form-card">--}}
{{--                                        <h2 class="fs-title text-center">Success !</h2> <br><br>--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>--}}
{{--                                        </div> <br><br>--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-7 text-center">--}}
{{--                                                <h5>You Have Successfully Signed Up</h5>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </fieldset>--}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('front/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Profile Settings JS -->
    <script src="{{asset('front/assets/js/profile-settings.js')}}"></script>
    <script>

        $('#add-user-form').validate({
            errorPlacement: function (error, element) {
                console.log('error')
                console.log(error)
                console.log(element)
                console.log(element.attr("id"))

                $(element)
                    .closest("form")
                    .find("label[for='error-" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
            rules: {
                user_type: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                photo: {
                    required: true,
                },
                birthdate: {
                    required: true,
                },
            },

            submitHandler: function (form) {
                // $("#add-category").addClass('loading')

                dashboardRequest.post('{{ route('register') }}', $("#add-user-form").serialize(), function (response) {
                    // $("#add-category").removeClass('loading')
                    $("#add-user-form .errorMessage").html(response.status ? dashboardRequest.getSuccessMessageHtml(response.message) : dashboardRequest.getErrorMessageHtml(response.message));
                    animateCSS('#add-user.errorMessage', 'bounceIn');
                    if (response.status){
                        setTimeout(function () {
                            // animateCSS('#add-category .errorMessage', 'flipOutX').then(() => $("#add-category .errorMessage").html(''));
                            window.location.reload();
                        }, 5000)
                    }

                })
            }

        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#output')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('select').select2({
            insertTag: function (data, tag) {
                // Insert the tag at the end of the results
                data.push(tag);
            }
        });

        $("#history").select2({
            placeholder: "التاريخ الطبي والمشاكل التغذوية",
            allowClear: true
        });

        $('#history').on('change', function() {
                var test = [];
                $.each($('#history :selected'), function(){
                    test.push($(this).val());
                    if($(this).val() == 'other') {
                        // $('#for_sales_fields').show();
                        $('#ifYes').removeClass('d-none');
                    }
                    else
                        $('#ifYes').addClass('d-none');
                })

            }
        );
        $('#usual_medicines').on('change', function() {
                var test = [];
                $.each($('#usual_medicines :selected'), function(){
                    test.push($(this).val());
                    if($(this).val() == 'yes') {
                        $('#medicines').removeClass('d-none');
                    }
                    else
                        $('#medicines').addClass('d-none');
                })

            }
        );
        $('#allergenic_foods').on('change', function() {
                var test = [];
                $.each($('#allergenic_foods :selected'), function(){
                    test.push($(this).val());
                    if($(this).val() == 'yes') {
                        $('#foods').removeClass('d-none');
                    }
                    else
                        $('#foods').addClass('d-none');
                })

            }
        );
        $('#doctor_type').on('change', function() {
                var test = [];
                $.each($('#doctor_type :selected'), function(){
                    test.push($(this).val());
                    if($(this).val() == 'Follow up of patients') {
                        $('#patients').removeClass('d-none');
                    }
                    else
                        $('#patients').addClass('d-none');

                    if($(this).val() == 'Trainer') {
                        $('#trainer').removeClass('d-none');
                    }
                    else
                        $('#trainer').addClass('d-none');
                })

            }
        );
        $('#type').on('change', function() {
                var test = [];
                $.each($('#type :selected'), function(){
                    test.push($(this).val());
                    if($(this).val() == 'Patient') {
                        $('#patient').removeClass('d-none');
                        $('#patient-form').removeClass('d-none');
                    }
                    else {
                        $('#patient').addClass('d-none');
                        $('#patient-form').addClass('d-none');
                    }
                    if($(this).val() == 'Doctor') {
                        $('#doctor').removeClass('d-none');
                        $('#doctor-form').removeClass('d-none');
                    }
                    else {
                        $('#doctor').addClass('d-none');
                        $('#doctor-form').addClass('d-none');
                    }
                })

            }
        );


        $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

//Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
                next_fs.show();
//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

//Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
                previous_fs.show();

//hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
// for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function(){
                return false;
            })

        });
    </script>

    @endsection
