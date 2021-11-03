@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<form action="{{ route('doctor-profile-update') }}" method="post" method="post"  enctype="multipart/form-data" role="form"  >
    {{ csrf_field() }}
    <!-- بيانات الطبيب -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">بيانات الطبيب</h4>
            <div class="row form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="change-avatar">
                            <div class="profile-img">
                                <img src="{{ (@$user->photo) ? url(@$user->photo) : asset('assets/front/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image" id="profileImg_1" onclick="uploade(1)" >
                            </div>
                            <div class="upload-img mr-5">
                                <div class="change-photo-btn">
                                    <span><i class="fa fa-upload"></i> صورة شخصية</span>
                                    <input type="file" class="upload" name="photo" id="file_1" onchange="imageUploaded(this , 1)" >
                                </div>
                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الإسم <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" readonly value="{{ $user->name }}" name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>البريد الإلكتروني <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" readonly  value="{{ $user->email }}" name="email">
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="error-password_confirmation"></label>
                    <div class="form-group form-focus">
                        <input  name="phone" id="phone" type="tel" value="{{ $user->phone }}" required
                                autocomplete="phone" autofocus class="form-control floating @error('phone') error @enderror">
                        <label for="phone" class="focus-label">رقم التليفون</label>
                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide"></span>
                    </div>
                    @error('phone')
                        <span class="error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="error-phone"></label>
                    <div class="errorMessage"></div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>النوع</label>
                        <select class="form-control select" name="gender">
                            <option disabled>Select</option>
                            <option value="Male">ذكر</option>
                            <option value="Female">إنثي</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <label>الدولة</label>
                        <input type="text" class="form-control text-right" value="{{ @$user->profile->country }}" name="country" placeholder="Country" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <label>المدينة</label>
                        <input type="text" class="form-control text-right" value="{{ @$user->profile->city }}" name="city" placeholder="City" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <label>تاريخ الميلاد</label>
                        <input type="date" class="form-control text-right" value="{{ date_create($user->birthdate)->format('Y-m-d') }}" name="birthdate">
                    </div>
                </div>
                    @php
                        $doctor_type = @$user->profile->doctor_type;
                    @endphp

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type of service provided</label>
                        <select class="form-control select" name="doctor_type" onchange="changeDocType(this.value)">
                            <option disabled>Select</option>
                            <option value="Trainee"  {{ ($doctor_type == 'Trainee') ? 'selected' : '' }} >Trainee</option>
                            <option value="Trainer" {{ ($doctor_type == 'Trainer') ? 'selected' : '' }} >Trainer</option>
                            <option value="Follow up of patients" {{ ($doctor_type == 'Follow up of patients') ? 'selected' : '' }} >Follow up</option>
                        </select>
                    </div>
                </div>

                <div id="Doctor-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Degree <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{ @$user->profile->qualification }}" name="qualification" id="qualification" placeholder="Qualification">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Specialization <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ @$user->profile->specialty_certificate }}" name="specialty_certificate" id="specialty_certificate" placeholder="specialty_certificate">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Scientific facility <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{ @$user->profile->university }}" name="university" id="university" placeholder="university"  >
                        </div>
                    </div>
                </div>

                <div id="Doctor-div-2" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>communication method</label>
                            <select class="form-control select" name="communication_way">
                                <option >Select</option>
                                <option value="Private"  {{ (@$user->profile->communication_way == 'Private') ? 'selected' : '' }} >Private</option>
                                <option value="Group"  {{ (@$user->profile->communication_way == 'Group') ? 'selected' : '' }} >Group</option>
                                <option value="Both"  {{ (@$user->profile->communication_way == 'Both') ? 'selected' : '' }} >Both</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="follow_up_fee">Monthly Service Fee</label>
                            <input type="number" class="form-control" placeholder="Monthly Service Fee" step="0.01" name="follow_up_fee" id="follow_up_fee" value="{{ @$user->profile->follow_up_fee }}"  {{ ( $doctor_type == 'Follow up of patients') ? 'required' : '' }}  >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="accept_promotions"><h3>Do you accept a discount code</h3></label>
                            <input type="checkbox" class="" name="accept_promotions" id="accept_promotions"  >
                        </div>
                    </div>
                </div>

                <div class="col-md-6" id="training_fee-div"  style="{{($doctor_type == 'Trainee') ? 'display:none;' : '' }} ">
                    <div class="form-group">
                        <label for="training_fee">Training Fee</label>
                        <input type="number" class="form-control" placeholder="Training Fee" step="0.01" name="training_fee" id="training_fee" value="{{ @$user->profile->training_fee }}"  {{ ( $doctor_type != 'Trainee') ? 'required' : '' }} >
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- /بيانات الطبيب -->

    <div class="card" id="trainer-div" style="{{($doctor_type != 'Trainer' && $doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <!-- About Me -->
                    <div class="form-group mb-0">
                        <label>About Me</label>
                        <textarea class="form-control" rows="5" name="about" id="about" >{{ @$user->profile->about }}</textarea>
                    </div>
                    <!-- /About Me -->
                </div>

                @php
                $interrests = $user->interests->pluck('name')->toArray();
                @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Interests</label>
                        <select class="form-control select2" name="interests[]" id="interests" multiple>
                            <option disabled>Select</option>

                            <option {{ (in_array('التغذية الانبوبية' , $interrests) ? 'selected' : '' ) }} value="التغذية الانبوبية "> التغذية الانبوبية  </option>
                            <option {{ (in_array('التغذية الوريدية' , $interrests) ? 'selected' : '' ) }} value="التغذية الوريدية"> التغذية الوريدية </option>
                            <option {{ (in_array('عملية التقييم الغذائي' , $interrests) ? 'selected' : '' ) }} value="عملية التقييم الغذائي"> عملية التقييم الغذائي </option>
                            <option {{ (in_array('الامراض الاستقلابية' , $interrests) ? 'selected' : '' ) }} value="الامراض الاستقلابية"> الامراض الاستقلابية </option>
                            <option {{ (in_array('سمنة أطفال ' , $interrests) ? 'selected' : '' ) }} value="سمنة أطفال "> سمنة أطفال  </option>
                            <option {{ (in_array('نحافة أطفال ' , $interrests) ? 'selected' : '' ) }} value="نحافة أطفال "> نحافة أطفال  </option>
                            <option {{ (in_array('سكري أطفال ' , $interrests) ? 'selected' : '' ) }} value="سكري أطفال "> سكري أطفال  </option>
                            <option {{ (in_array('سمنة بالغين ' , $interrests) ? 'selected' : '' ) }} value="سمنة بالغين "> سمنة بالغين  </option>
                            <option {{ (in_array('نحافة بالغين' , $interrests) ? 'selected' : '' ) }} value="نحافة بالغين"> نحافة بالغين </option>
                            <option {{ (in_array('سكري بالغين' , $interrests) ? 'selected' : '' ) }} value="سكري بالغين"> سكري بالغين </option>
                            <option {{ (in_array('تغذية الرياضين ' , $interrests) ? 'selected' : '' ) }} value="تغذية الرياضين "> تغذية الرياضين  </option>
                            <option {{ (in_array('تغذية الحوامل' , $interrests) ? 'selected' : '' ) }} value="تغذية الحوامل"> تغذية الحوامل </option>
                            <option {{ (in_array('تغذية المكممين' , $interrests) ? 'selected' : '' ) }} value="تغذية المكممين"> تغذية المكممين </option>
                            <option {{ (in_array('تغذية الأورام ' , $interrests) ? 'selected' : '' ) }} value="تغذية الأورام "> تغذية الأورام  </option>
                            <option {{ (in_array('الكلى ' , $interrests) ? 'selected' : '' ) }} value="الكلى "> الكلى  </option>
                            <option {{ (in_array('امراض الدم ' , $interrests) ? 'selected' : '' ) }} value="امراض الدم "> امراض الدم  </option>
                            <option {{ (in_array('تغذية المسنين' , $interrests) ? 'selected' : '' ) }} value="تغذية المسنين"> تغذية المسنين </option>
                            <option {{ (in_array('الانيميا ' , $interrests) ? 'selected' : '' ) }} value="الانيميا "> الانيميا  </option>
                            <option {{ (in_array('امراض القلب' , $interrests) ? 'selected' : '' ) }} value="امراض القلب"> امراض القلب </option>
                            <option {{ (in_array('التغذية في زراعة الأعضاء' , $interrests) ? 'selected' : '' ) }} value="التغذية في زراعة الأعضاء"> التغذية في زراعة الأعضاء </option>
                            <option {{ (in_array('التغذية في الامراض الصدرية' , $interrests) ? 'selected' : '' ) }} value="التغذية في الامراض الصدرية"> التغذية في الامراض الصدرية </option>
                            <option {{ (in_array('امراض الجهاز الهضمي مثل (القلون العصبي)' , $interrests) ? 'selected' : '' ) }} value="امراض الجهاز الهضمي مثل (القلون العصبي)"> امراض الجهاز الهضمي مثل (القلون العصبي) </option>
                            <option {{ (in_array('التغذية في الحالات النفسية مثل الاكتئاب ,,,' , $interrests) ? 'selected' : '' ) }} value="التغذية في الحالات النفسية مثل الاكتئاب ,,,"> التغذية في الحالات النفسية مثل الاكتئاب ,,, </option>
                            <option {{ (in_array('التغذية في حالات الحوامل ' , $interrests) ? 'selected' : '' ) }} value="التغذية في حالات الحوامل "> التغذية في حالات الحوامل  </option>
                            <option {{ (in_array('التغذية في الرضع والأطفال ' , $interrests) ? 'selected' : '' ) }} value="التغذية في الرضع والأطفال "> التغذية في الرضع والأطفال  </option>
                            <option {{ (in_array('عدم تحمل اللاكتوز ' , $interrests) ? 'selected' : '' ) }} value="عدم تحمل اللاكتوز "> عدم تحمل اللاكتوز  </option>
                            <option {{ (in_array('حالات السيلياك ' , $interrests) ? 'selected' : '' ) }} value="حالات السيلياك "> حالات السيلياك  </option>
                            <option {{ (in_array('برنامج الحمية الكيتونية' , $interrests) ? 'selected' : '' ) }} value="برنامج الحمية الكيتونية"> برنامج الحمية الكيتونية </option>
                            <option {{ (in_array('تغذية الحالات الحرجة' , $interrests) ? 'selected' : '' ) }} value="تغذية الحالات الحرجة"> تغذية الحالات الحرجة </option>
                            <option {{ (in_array('تغذية الحالات الحرجة للأطفال' , $interrests) ? 'selected' : '' ) }} value="تغذية الحالات الحرجة للأطفال"> تغذية الحالات الحرجة للأطفال </option>
                            <option {{ (in_array('تغذية الحالات الحرجة للخدج' , $interrests) ? 'selected' : '' ) }} value="تغذية الحالات الحرجة للخدج"> تغذية الحالات الحرجة للخدج </option>
                            <option {{ (in_array('التغذية في حالات الحروق' , $interrests) ? 'selected' : '' ) }} value="التغذية في حالات الحروق"> التغذية في حالات الحروق </option>

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Medical License Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" required value="{{ @$user->profile->medical_license_number }}" name="medical_license_number" id="medical_license_number" placeholder="universityMedical License Number"  >
                    </div>
                </div>


                <div class="col-12 mb-3">
                    <div class="form-group mb-0">
                        <label>Training Program</label>
                        <textarea class="form-control" rows="5" name="training_program" id="training_program" placeholder="نبذة عن النظام المتبع" >{{ @$user->profile->training_program }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- communication-channels-div -->
    <div class="card" id="communication-channels-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
        <div class="card-body">
            <h4 class="card-title">Communication channels</h4>

                @php
                $channels = ($user->channels && count($user->channels)) ? $user->channels : [] ;
                $communications = ($user->communications && count($user->communications)) ? $user->communications : [] ;
                @endphp
                @foreach ($channels as $channel)
                <div class="row form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Channel</label>
                            <select class="form-control select" name="channel_type[]">
                                <option disabled selected>Select</option>
                                <option value="Whatsapp" {{ ($channel->channel_type == 'Whatsapp') ? 'selected' : '' }} >واتساب</option>
                                <option value="Telegram" {{ ($channel->channel_type == 'Telegram') ? 'selected' : '' }} >تليجرام</option>
                                <option value="Facebook" {{ ($channel->channel_type == 'Facebook') ? 'selected' : '' }} >فيسبوك</option>
                                <option value="Emo"      {{ ($channel->channel_type == 'Emo')      ? 'selected' : '' }} >إيمـو</option>
                                <option value="Line"     {{ ($channel->channel_type == 'Line')     ? 'selected' : '' }} >لايـن</option>
                                <option value="Skype"    {{ ($channel->channel_type == 'Skype')    ? 'selected' : '' }} >سكـايـب</option>
                                <option value="WeChat"   {{ ($channel->channel_type == 'WeChat')   ? 'selected' : '' }} >WeChat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" value="{{ $channel->link }}" class="form-control" name="link[]" placeholder="Link Address">
                        </div>
                    </div>

                    <div class="col-md-1 pt-4 text-center">
                        <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                @endforeach
            <div id="channels-rows">
                <div class="row form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Channel</label>
                            <select class="form-control select" name="channel_type[]">
                                <option disabled selected>Select</option>
                                <option value="Whatsapp" >واتساب</option>
                                <option value="Telegram" >تليجرام</option>
                                <option value="Facebook" >فيسبوك</option>
                                <option value="Emo" >إيمـو</option>
                                <option value="Line" >لايـن</option>
                                <option value="Skype" >سكـايـب</option>
                                <option value="WeChat" >WeChat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link[]" placeholder="Link Address">
                        </div>
                    </div>

                    <div class="col-md-1 pt-4 text-center">
                        <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-channel"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /communication-channels-div -->

    <!-- communication-times-div -->
    <div class="card contact-card" id="communication-times-div" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
        <div class="card-body">
            <h4 class="card-title">Communication times</h4>
            @foreach ($communications as $communication )
                <div class="row form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Day</label>
                            <select class="form-control select" name="day[]">
                                <option value=""></option>
                                <option value="Saturday" {{ ($communication->day == 'Saturday') ? 'selected' : '' }} >Saturday</option>
                                <option value="Sunday" {{ ($communication->day == 'Sunday') ? 'selected' : '' }} >Sunday</option>
                                <option value="Monday" {{ ($communication->day == 'Monday') ? 'selected' : '' }} >Monday</option>
                                <option value="Tuesday" {{ ($communication->day == 'Tuesday') ? 'selected' : '' }} >Tuesday</option>
                                <option value="Wednesday" {{ ($communication->day == 'Wednesday') ? 'selected' : '' }} >Wednesday</option>
                                <option value="Thursday" {{ ($communication->day == 'Thursday') ? 'selected' : '' }} >Thursday</option>
                                <option value="Friday" {{ ($communication->day == 'Friday') ? 'selected' : '' }} >Friday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Start At</label>
                            <input type="time" class="form-control" name="start_at[]" {{ $communication->start_at }} >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">End At</label>
                            <input type="time" class="form-control" name="end_at[]" {{ $communication->end_at }} >
                        </div>
                    </div>
                    <div class="col-md-1 pt-4 text-center">
                        <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            @endforeach

            <div id="communications-rows">
                <div class="row form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Day</label>
                            <select class="form-control select" name="day[]">
                                <option value="" ></option>
                                <option value="Saturday" >Saturday</option>
                                <option value="Sunday" >Sunday</option>
                                <option value="Monday" >Monday</option>
                                <option value="Tuesday" >Tuesday</option>
                                <option value="Wednesday" >Wednesday</option>
                                <option value="Thursday" >Thursday</option>
                                <option value="Friday" >Friday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Start At</label>
                            <input type="time" class="form-control" name="start_at[]">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">End At</label>
                            <input type="time" class="form-control" name="end_at[]">
                        </div>
                    </div>
                    <div class="col-md-1 pt-4 text-center">
                        <a href="javascript:void(0);" onclick="this.parentElement.parentElement.remove()" class="del-channel"><i class="fas fa-times"></i></a>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-communication"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /communication-times-div -->


    <!-- attachments	 -->
    <div class="card services-card" id="attachments" style="{{($doctor_type != 'Follow up of patients') ? 'display:none;' : '' }} ">
        <div class="card-body">
            <h4 class="card-title mb-2">Attachments</h4>
            <small>Please attach the following</small>
        <div class="row mt-3">
            <div class="col-md-4">
                    <div class="upload-img">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i> Professional Classification</span>
                            <input type="file" class="upload" name="classification_certificate" >
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="upload-img">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i> Bank statements certificate </span>
                            <input type="file" class="upload" name="bank_statements_certificate">
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="upload-img">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i> University qualification</span>
                            <input type="file" class="upload" name="university_qualification">
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /attachments -->

    <div class="submit-section submit-btn-bottom text-center">
        <button type="submit" class="btn btn-primary submit-btn">حفظ التعديلات</button>
    </div>
</form>


@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').select2({maximumSelectionLength: 3});
    function changeDocType(val)
    {
        if(val == 'Follow up of patients')
        {
            $('#Doctor-div').css('display', 'contents');
            $('#Doctor-div-2').css('display', 'contents');
            $('#university_qualification').prop('required', true);
            $('#specialty_certificate').prop('required', true);
            $('#university').prop('required', true);
            $('#about').prop('required', true);
            $('#interests').prop('required', true);
            $('#follow_up_fee').prop('required', true);
            $('#communication-channels-div').css('display', 'flex');
            $('#attachments').css('display', 'flex');
            $('#communication-times-div').css('display', 'flex');
            $('#trainer-div').css('display', 'flex');
            $('#training_fee-div').css('display', 'none');
            $('#training_fee').prop('required', false);
        }
        else if(val == 'Trainer')
        {

            $('#Doctor-div').css('display', 'none');
            $('#Doctor-div-2').css('display', 'none');
            $('#university_qualification').prop('required', false);
            $('#specialty_certificate').prop('required', false);
            $('#university').prop('required', false);
            $('#follow_up_fee').prop('required', false);
            $('#communication-channels-div').css('display', 'none');
            $('#attachments').css('display', 'none');
            $('#communication-times-div').css('display', 'none');
            ///////////////////////
            $('#trainer-div').css('display', 'flex');
            $('#trainer-div-2').css('display', 'flex');
            $('#about').prop('required', true);
            $('#interests').prop('required', true);
            $('#training_fee-div').css('display', 'block');
            $('#training_fee').prop('required', true);
        }
        else
        {
            $('#Doctor-div').css('display', 'none');
            $('#Doctor-div-2').css('display', 'none');
            $('#university_qualification').prop('required', false);
            $('#specialty_certificate').prop('required', false);
            $('#university').prop('required', false);
            $('#about').prop('required', false);
            $('#interests').prop('required', false);
            $('#follow_up_fee').prop('required', false);
            $('#communication-channels-div').css('display', 'none');
            $('#attachments').css('display', 'none');
            $('#communication-times-div').css('display', 'none');
            $('#trainer-div').css('display', 'none');
            $('#training_fee').prop('required', false);
            $('#training_fee-div').css('display', 'none');
        }
    }

    var channel_row = $('#channels-rows').html();
    var communication_row = $('#communications-rows').html();
    $('.add-channel').on('click', function () {
            $('#channels-rows').append(channel_row);
        }
    );
    $('.add-communication').on('click', function () {
            $('#communications-rows').append(communication_row);
        }
    );

    function uploade(ii)
    {
        $('#file_1').click();
    }

    function imageUploaded(input , ii)
    {
        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
        var oInput = input;
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#profileImg_' + ii).attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            removeUpload();
                        }
                        break;
                    }
                }
                if (!blnValid) {
                    var err = $('#image_err_msg').val()
                    alert(err);
                    return false;
                }
            }
        }
        return true;
    }

    function removeUpload() {
        var default_src = "{{ asset('assets/front/img/doctors/doctor-thumb-02.jpg') }}";
        $('#profileImg').attr('src', default_src);
    }

</script>
@endsection
