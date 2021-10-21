@extends('layouts.userLogin')
@section('styles')
    <link href=" {{ asset('assets/front/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 offset-md-2">

                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">

                            <div class="col-md-12 col-lg-10 login-right">
                                <div class="login-header text-center">
                                    <h3>اكمال بيانات الحساب</h3>
                                </div>

                                <!-- Register Form -->
                                <form id="complete-form" action="{{ route('complete_patient_profile', auth()->id()) }}"
                                      method="post">
                                    @csrf
                                    <h2 class="fs-title text-center">{{__('front/patient.info')}}</h2>
                                    <div class="row form-row">
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="length"
                                                       class="form-control floating @error('length') error @enderror"
                                                       value="{{ old('length') }}" required autocomplete="length"
                                                       autofocus name="length" min="25.00">
                                                <label for="length" class="focus-label">
                                                    الطول(سم)
                                                </label>
                                            </div>
                                            <label for="error-length"></label>
                                            @error('length')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="weight"
                                                       class="form-control floating @error('length') error @enderror"
                                                       value="{{ old('weight') }}" required autocomplete="weight"
                                                       autofocus name="weight" min="25.00">
                                                <label for="weight" class="focus-label">
                                                    الوزن(كجم)
                                                </label>
                                            </div>
                                            <label for="error-weight"></label>
                                            @error('weight')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="highest_weight"
                                                       class="form-control floating @error('highest_weight') error @enderror"
                                                       value="{{ old('highest_weight') }}" required
                                                       autocomplete="highest_weight" autofocus name="highest_weight"
                                                       min="25.00">
                                                <label for="highest_weight" class="focus-label">
                                                    اعلي وزن حصلت عليه؟ (كجم)
                                                </label>
                                            </div>
                                            <label for="error-highest_weight"></label>
                                            @error('highest_weight')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="lowest_weight"
                                                       class="form-control floating @error('lowest_weight') error @enderror"
                                                       value="{{ old('lowest_weight') }}" required
                                                       autocomplete="lowest_weight" autofocus name="lowest_weight"
                                                       min="25.00">
                                                <label for="lowest_weight" class="focus-label">
                                                    اقل وزن حصلت عليه؟ (كجم)
                                                </label>
                                            </div>
                                            <label for="error-lowest_weight"></label>
                                            @error('lowest_weight')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="usual_weight"
                                                       class="form-control floating @error('usual_weight') error @enderror"
                                                       value="{{ old('usual_weight') }}" required
                                                       autocomplete="usual_weight" autofocus name="usual_weight"
                                                       min="25.00">
                                                <label for="usual_weight" class="focus-label">
                                                    الوزن المعتاد؟ (كجم)
                                                </label>
                                            </div>
                                            <label for="error-usual_weight"></label>
                                            @error('usual_weight')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <select class="form-control  @error('usual_medicines') error @enderror"
                                                        name="usual_medicines" id="usual_medicines" required>
                                                    <option value="" disabled selected></option>
                                                    <option value="yes">نعم</option>
                                                    <option value="no"> لا</option>
                                                </select>
                                                <label for="usual_medicines" class="focus-label">
                                                    هل يتم تناول اي نوع من الأدويه؟
                                                </label>
                                            </div>
                                            <div class="form-group form-focus d-none" id="usual_medicines_other-field">
                                                <textarea type="text" id="usual_medicines_other"
                                                          name="usual_medicines_other"
                                                          class="form-control "></textarea>
                                                <label for="usual_medicines_other" class="focus-label">ما هي الأدوية
                                                    الأخرى؟</label>
                                            </div>
                                            <label for="error-usual_medicines"></label>
                                            @error('usual_medicines')
                                            <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <select class="form-control  @error('allergenic_foods') error @enderror"
                                                        name="allergenic_foods" id="allergenic_foods" required>
                                                    <option value="" disabled selected></option>
                                                    <option value="yes">نعم</option>
                                                    <option value="no"> لا</option>
                                                </select>
                                                <label for="allergenic_foods" class="focus-label">
                                                    هل لديك أطعمة معينه تسبب الحساسية؟
                                                </label>
                                            </div>
                                            <div class="form-group form-focus d-none" id="allergenic_foods-field">
                                                <textarea type="text" id="allergenic_foods_selected"
                                                          name="allergenic_foods_selected"
                                                          class="form-control "></textarea>
                                                <label for="allergenic_foods_selected" class="focus-label">ما هي هذه
                                                    الأطعمة؟</label>
                                            </div>
                                            <label for="error-allergenic_foods"></label>
                                            @error('allergenic_foods')
                                            <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <select class="form-control  @error('history') error @enderror"
                                                        name="history[]" id="history" required multiple>
                                                    <option value="ارتفاع ضغط الدم">ارتفاع ضغط الدم</option>
                                                    <option value="امراض السكري"> امراض السكري</option>
                                                    <option value="السمنة"> السمنة</option>
                                                    <option value="اسهال"> اسهال</option>
                                                    <option value="امساك"> امساك</option>
                                                    <option value="قيء"> قيء</option>
                                                    <option value="غثيان">غثيان</option>
                                                    <option value="صعوبة بالمضغ "> صعوبة بالمضغ</option>
                                                    <option value="صعوبة بالبلع"> صعوبة بالبلع</option>
                                                    <option value="no_data"> لا يوجد</option>
                                                    <option value="other"> اخري</option>
                                                </select>
                                                <label for="history"
                                                       class="focus-label">{{__('front/patient.history')}}</label>
                                            </div>
                                            <label for="error-history"></label>
                                            @error('history')
                                            <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus d-none" id="history_other-field">
                                                <textarea type="text" id="history_other" name="history_other"
                                                          class="form-control"></textarea>
                                                <label for="history_other" class="focus-label">ما هي الأمراض
                                                    الأخرى؟</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <h2 class="fs-title text-center">نمط الحياه</h2>
                                    <div class="row form-row">
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="meals_number"
                                                       class="form-control floating @error('meals_number') error @enderror"
                                                       value="{{ old('meals_number') }}" required
                                                       autocomplete="meals_number" autofocus name="meals_number" min="1"
                                                       max="10">
                                                <label for="meals_number" class="focus-label">
                                                    {{ __('front/patient.meals_number') }}
                                                </label>
                                            </div>
                                            <label for="error-meals_number"></label>
                                            @error('meals_number')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="text" id="meals_order"
                                                       class="form-control floating @error('meals_order') error @enderror"
                                                       value="{{ old('meals_order') }}" required
                                                       autocomplete="meals_order" autofocus name="meals_order">
                                                <label for="meals_order" class="focus-label">
                                                    {{ __('front/patient.meals_order') }}
                                                </label>
                                            </div>
                                            <label for="error-meals_order"></label>
                                            @error('meals_order')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="average_sleeping_hours"
                                                       class="form-control floating @error('average_sleeping_hours') error @enderror"
                                                       value="{{ old('average_sleeping_hours') }}" required
                                                       autocomplete="average_sleeping_hours" autofocus
                                                       name="average_sleeping_hours" min="1.00" max="18.00`">
                                                <label for="meals_number" class="focus-label">
                                                    {{ __('front/patient.average_sleeping_hours') }}
                                                </label>
                                            </div>
                                            <label for="error-average_sleeping_hours"></label>
                                            @error('average_sleeping_hours')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" step="0.01" id="cups_of_water_daily"
                                                       class="form-control floating @error('cups_of_water_daily') error @enderror"
                                                       value="{{ old('cups_of_water_daily') }}" required
                                                       autocomplete="cups_of_water_daily" autofocus
                                                       name="cups_of_water_daily" min="1.00" max="200.00`">
                                                <label for="cups_of_water_daily" class="focus-label">
                                                    {{ __('front/patient.cups_of_water_daily') }}
                                                </label>
                                            </div>
                                            <label for="error-cups_of_water_daily"></label>
                                            @error('cups_of_water_daily')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h2 class="fs-title text-center">النشاط الرياضي</h2>
                                    <div class="row form-row">
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <select class="form-control  @error('sport_activities') error @enderror"
                                                        name="sport_activities" id="sport_activities" required>
                                                    <option value="1.2">خامل 1.2 : لا تمارين - اعمال مكتبية</option>
                                                    <option value="1.375"> نشاط خفيف 1.375 : 20 دقيقع رياضه خفيفة /
                                                        نمارين , 1-3 ايام بالاسبوع مثل المشي ,ركوب الدراجه أو الجري
                                                    </option>
                                                    <option value="1.55">نشاط متوسط 1.55 : 30-60 دقيقة رياضة متوسطة /
                                                        تمارين , 3-5 ايام بالأسبوع
                                                    </option>
                                                    <option value="1.725">نشاط عالي 1.725 : 60 دقيقة رياضه عنيفة /
                                                        تمارين , 5-7 ايام بالأسبوع
                                                    </option>
                                                </select>
                                                <label for="sport_activities"
                                                       class="focus-label">{{__('front/patient.sport_activities')}}</label>
                                            </div>
                                            <label for="error-sport_activities"></label>
                                            @error('sport_activities')
                                            <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h2 class="fs-title text-center">العادات الغذائية</h2>
                                    <div class="row form-row">
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <textarea id="favorite_meals"
                                                          class="form-control floating @error('favorite_meals') error @enderror"
                                                          required autofocus
                                                          name="favorite_meals">{{ old('favorite_meals') }}</textarea>
                                                <label for="favorite_meals" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-favorite_meals"></label>
                                            @error('favorite_meals')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="unfavorite_meals"
                                                      class="form-control floating @error('unfavorite_meals') error @enderror"
                                                      required autofocus
                                                      name="unfavorite_meals">{{ old('unfavorite_meals') }}</textarea>
                                                <label for="unfavorite_meals" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-unfavorite_meals"></label>
                                            @error('unfavorite_meals')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h2 class="fs-title text-center">الأطعمة المفضلة والغير مفضلة</h2>
                                    <div class="row form-row">
                                        <label class="col-12 float-right">{{__('front/patient.carbohydrates')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="carbohydrates_favorite"
                                                      class="form-control floating @error('carbohydrates_favorite') error @enderror"
                                                      autofocus
                                                      name="carbohydrates_favorite">{{ old('carbohydrates_favorite') }}</textarea>
                                                <label for="carbohydrates_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-carbohydrates_favorite"></label>
                                            @error('carbohydrates_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                    <textarea id="carbohydrates_unFavorite"
                                                              class="form-control floating @error('carbohydrates_unFavorite') error @enderror"
                                                              autofocus
                                                              name="carbohydrates_unFavorite">{{ old('carbohydrates_unFavorite') }}</textarea>
                                                <label for="carbohydrates_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-carbohydrates_unFavorite"></label>
                                            @error('carbohydrates_unFavorite')
                                            <span class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label class="col-12 float-right">{{__('front/patient.vegetables')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="vegetables_favorite"
                                                      class="form-control floating @error('vegetables_favorite') error @enderror"
                                                      autofocus
                                                      name="vegetables_favorite">{{ old('vegetables_favorite') }}</textarea>
                                                <label for="vegetables_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-vegetables_favorite"></label>
                                            @error('vegetables_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="vegetables_unFavorite"
                                                      class="form-control floating @error('vegetables_unFavorite') error @enderror"
                                                      autofocus
                                                      name="vegetables_unFavorite">{{ old('vegetables_unFavorite') }}</textarea>
                                                <label for="vegetables_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-vegetables_unFavorite"></label>
                                            @error('vegetables_unFavorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="col-12 float-right">{{__('front/patient.fruits')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="fruits_favorite"
                                                      class="form-control floating @error('fruits_favorite') error @enderror"
                                                      autofocus
                                                      name="fruits_favorite">{{ old('fruits_favorite') }}</textarea>
                                                <label for="fruits_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-fruits_favorite"></label>
                                            @error('fruits_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="fruits_unFavorite"
                                                      class="form-control floating @error('fruits_unFavorite') error @enderror"
                                                      autofocus
                                                      name="fruits_unFavorite">{{ old('fruits_unFavorite') }}</textarea>
                                                <label for="fruits_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-fruits_unFavorite"></label>
                                            @error('fruits_unFavorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="col-12 float-right">{{__('front/patient.dairy_products')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="dairy_products_favorite"
                                                      class="form-control floating @error('dairy_products_favorite') error @enderror"
                                                      autofocus
                                                      name="dairy_products_favorite">{{ old('dairy_products_favorite') }}</textarea>
                                                <label for="dairy_products_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-dairy_products_favorite"></label>
                                            @error('dairy_products_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="dairy_products_unFavorite"
                                                      class="form-control floating @error('dairy_products_unFavorite') error @enderror"
                                                      autofocus
                                                      name="dairy_products_unFavorite">{{ old('dairy_products_unFavorite') }}</textarea>
                                                <label for="dairy_products_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-dairy_products_unFavorite"></label>
                                            @error('dairy_products_unFavorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="col-12 float-right">{{__('front/patient.meat')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="meat_favorite"
                                                      class="form-control floating @error('meat_favorite') error @enderror"
                                                      autofocus
                                                      name="meat_favorite">{{ old('meat_favorite') }}</textarea>
                                                <label for="meat_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-meat_favorite"></label>
                                            @error('meat_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="meat_unFavorite"
                                                      class="form-control floating @error('meat_unFavorite') error @enderror"
                                                      autofocus
                                                      name="meat_unFavorite">{{ old('meat_unFavorite') }}</textarea>
                                                <label for="meat_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-meat_unFavorite"></label>
                                            @error('meat_unFavorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="col-12 float-right">{{__('front/patient.fats')}}</label>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="fats_favorite"
                                                      class="form-control floating @error('fats_favorite') error @enderror"
                                                      autofocus
                                                      name="fats_favorite">{{ old('fats_favorite') }}</textarea>
                                                <label for="fats_favorite" class="focus-label">
                                                    {{ __('front/global.favorite') }}
                                                </label>
                                            </div>
                                            <label for="error-fats_favorite"></label>
                                            @error('fats_favorite')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="fats_unFavorite"
                                                      class="form-control floating @error('fats_unFavorite') error @enderror"
                                                      autofocus
                                                      name="fats_unFavorite">{{ old('fats_unFavorite') }}</textarea>
                                                <label for="fats_unFavorite" class="focus-label">
                                                    {{ __('front/global.unfavorite') }}
                                                </label>
                                            </div>
                                            <label for="error-fats_unFavorite"></label>
                                            @error('fats_unFavorite')
                                            <span class="error" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <h2 class="fs-title text-center">الأسئلة العامة</h2>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="health_goal"
                                                      class="form-control floating @error('health_goal') error @enderror"
                                                      autofocus name="health_goal">{{ old('health_goal') }}</textarea>
                                                <label for="health_goal" class="focus-label">
                                                    {{ __('front/patient.health_goal') }}
                                                </label>
                                            </div>
                                            <label for="error-health_goal"></label>
                                            @error('health_goal')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="motivation"
                                                      class="form-control floating @error('motivation') error @enderror"
                                                      autofocus name="motivation">{{ old('motivation') }}</textarea>
                                                <label for="motivation" class="focus-label">
                                                    {{ __('front/patient.motivation') }}
                                                </label>
                                            </div>
                                            <label for="error-motivation"></label>
                                            @error('motivation')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                            <textarea id="confidence"
                                                      class="form-control floating @error('confidence') error @enderror"
                                                      autofocus name="confidence">{{ old('confidence') }}</textarea>
                                                <label for="confidence" class="focus-label">
                                                    {{ __('front/patient.confidence') }}
                                                </label>
                                            </div>
                                            <label for="error-confidence"></label>
                                            @error('confidence')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <input type="number" id="nutritionists_number_worked_with_before"
                                                       class="form-control floating @error('nutritionists_number_worked_with_before') error @enderror"
                                                       value="{{ old('nutritionists_number_worked_with_before') }}" required autocomplete="length"
                                                       autofocus name="nutritionists_number_worked_with_before" min="0">
                                            <label for="nutritionists_number_worked_with_before"
                                                       class="focus-label">
                                                    {{ __('front/patient.nutritionists_number_worked_with_before') }}
                                                </label>
                                            </div>
                                            <label for="error-nutritionists_number_worked_with_before"></label>
                                            @error('nutritionists_number_worked_with_before')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-focus">
                                                <select class="form-control  @error('lost_weight_without_planning_or_knowing_reasons') error @enderror"
                                                        name="lost_weight_without_planning_or_knowing_reasons" id="lost_weight_without_planning_or_knowing_reasons" required>
                                                    <option value="" disabled selected></option>
                                                    <option value="1">نعم</option>
                                                    <option value="0"> لا</option>
                                                </select>
                                                <label for="lost_weight_without_planning_or_knowing_reasons"
                                                       class="focus-label">
                                                    {{ __('front/patient.lost_weight_without_planning_or_knowing_reasons') }}
                                                </label>
                                            </div>
                                            <label for="error-lost_weight_without_planning_or_knowing_reasons"></label>
                                            @error('lost_weight_without_planning_or_knowing_reasons')
                                            <span class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="errorMessage"></div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">
                                        تحديث البيانات
                                    </button>
                                </form>
                                <!-- /Register Form -->

                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->

@endsection

@section('scripts')
    <script src="{{asset('assets/front/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Profile Settings JS -->
    <script src="{{asset('assets/front/js/profile-settings.js')}}"></script>
    <script>
        function readFileURL(input) {
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


        $('#history').on('change', function () {
                var test = [];
                $.each($('#history :selected'), function () {
                    test.push($(this).val());
                    if ($(this).val() == 'other') {
                        // $('#for_sales_fields').show();
                        $('#history_other-field').removeClass('d-none');
                    } else
                        $('#history_other-field').addClass('d-none');
                })

            }
        );

        $('#usual_medicines').on('change', function () {
            if ($(this).val() == 'yes') {
                $('#usual_medicines_other-field').removeClass('d-none');
            } else
                $('#usual_medicines_other-field').addClass('d-none');
        });

        $('#allergenic_foods').on('change', function () {
            if ($(this).val() == 'yes') {
                $('#allergenic_foods-field').removeClass('d-none');
            } else
                $('#allergenic_foods-field').addClass('d-none');
        });
        $("#complete-form").validate({
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
                length: {
                    required: true,
                    number: true
                },
                weight: {
                    required: true,
                    number: true
                },
                history: {
                    required: true,
                },
                usual_medicines: {
                    required: true,
                },
                allergenic_foods: {
                    required: true,
                },
                highest_weight: {
                    required: true,
                },
                lowest_weight: {
                    required: true,
                },
                usual_weight: {
                    required: true,
                },
                meals_number: {
                    required: true,
                },
                meals_order: {
                    required: true,
                },
                average_sleeping_hours: {
                    required: true,
                },
                cups_of_water_daily: {
                    required: true,
                },
                sport_activities: {
                    required: true,
                },
                favorite_meals: {
                    required: true,
                },
                unfavorite_meals: {
                    required: true,
                },
                carbohydrates_favorite: {
                    required: true,
                },
                carbohydrates_unFavorite: {
                    required: true,
                },
                vegetables_favorite: {
                    required: true,
                },
                vegetables_unFavorite: {
                    required: true,
                },
                fruits_favorite: {
                    required: true,
                },
                fruits_unFavorite: {
                    required: true,
                },
                dairy_products_favorite: {
                    required: true,
                },
                dairy_products_unFavorite: {
                    required: true,
                },
                meat_favorite: {
                    required: true,
                },
                meat_unFavorite: {
                    required: true,
                },
                fats_favorite: {
                    required: true,
                },
                fats_unFavorite: {
                    required: true,
                },
                health_goal: {
                    required: true,
                },
                motivation: {
                    required: true,
                },
                confidence: {
                    required: true,
                },
                nutritionists_number_worked_with_before: {
                    required: true,
                },
                lost_weight_without_planning_or_knowing_reasons: {
                    required: true,
                },
            },
        });

    </script>
@endsection
