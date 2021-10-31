<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\DoctorProfile;
use App\Models\communication_channel;
use App\Models\doctor_communication;
use App\Models\interest;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function doctorProfileSettings()
    {
        $user  = Auth::user();
        if($user && $user->hasRole('Doctor'))
        {
            return view('front.doctor.doctor-profile-settings' , compact('user'));
        }
    }

    public function doctorProfileUpdate(Request $request)
    {
        // dd($request->all());
        $user  = Auth::user();
        if(!$user || !$user->hasRole('Doctor'))
        {
            return back();
        }


        $image_name                     = '';
        $classification_certificate     = '';
        $bank_statements_certificate    = '';
        $university_qualification       = '';

        $profile = $user->profile;
        if(!$profile)
        {
            $profile = new DoctorProfile();
        }


        if($request->photo)
        {
            $image_name     =   'images/users/'.time().'_userP.'.$request->photo->getClientOriginalExtension();
            $user->photo    =   FileImage($request->file('photo'), $image_name);
        }

        if($request->classification_certificate)
        {
            $classification_certificate     =   'images/users/'.time().'_userP.'.$request->classification_certificate->getClientOriginalExtension();
            $profile->classification_certificate    =   FileImage($request->file('classification_certificate'), $classification_certificate);
        }

        if($request->bank_statements_certificate)
        {
            $bank_statements_certificate     =   'images/users/'.time().'_userP.'.$request->bank_statements_certificate->getClientOriginalExtension();
            $profile->bank_statements_certificate    =   FileImage($request->file('photo'), $bank_statements_certificate);
        }
        if($request->university_qualification)
        {
            $university_qualification     =   'images/users/'.time().'_userP.'.$request->university_qualification->getClientOriginalExtension();
            $profile->university_qualification    =   FileImage($request->file('photo'), $university_qualification);
        }

        $user->phone    = $request->phone;
        $user->gender   = $request->gender;
        $user->birthdate= $request->birthdate;
        $user->save();
        //dD($request->follow_up_fee);

        $profile->user_id                     =   $user->id;
        $profile->doctor_type                 =   $request->doctor_type;
        $profile->country                     =   $request->country;
        $profile->city                        =   $request->city;
        $profile->qualification               =   $request->qualification;
        $profile->about                       =   $request->about;
        $profile->medical_license_number      =   $request->medical_license_number;
        $profile->communication_way           =   ($request->doctor_type == 'Follow up of patients') ? $request->communication_way : null;
        $profile->accept_promotions           =   ($request->doctor_type == 'Follow up of patients') ? $request->accept_promotions : null;
        $profile->follow_up_fee               =   ($request->follow_up_fee) ? $request->follow_up_fee : null;
        $profile->training_fee                =   ($request->training_fee) ?  $request->training_fee: null;
        $profile->training_program            =   $request->training_program;
        $profile->classification_certificate  =   $request->classification_certificate;
        $profile->bank_statements_certificate =   $request->bank_statements_certificate;
        $profile->university_qualification    =   $request->university_qualification;
        $profile->experience_certificate      =   $request->experience_certificate;
        $profile->specialty_certificate       =   $request->specialty_certificate;

        $profile->save();

        @$user->channels()->delete();
        @$user->communications()->delete();

        //doctor_channels
        if($request->doctor_type == 'Follow up of patients' && $request->channel_type && is_array($request->channel_type))
        {
            for($i=0 ; $i < count($request->channel_type) ; $i++)
            {
                $channel_type   = $request->channel_type[$i];
                $link           = $request->link[$i];
                if($channel_type && $link)
                {
                    $channels[]     = communication_channel::create([
                        'user_id'       => $user->id,
                        'channel_type'  => $channel_type,
                        'link'          => $link,
                    ]);
                }
            }
        }

        //doctor_communication
        if($request->doctor_type == 'Follow up of patients' && $request->day && is_array($request->day))
        {
            for($i=0 ; $i < count($request->day) ; $i++)
            {
                $day        = $request->day[$i];
                $start      = @$request->start_at[$i];
                $end        = @$request->end_at[$i];
                if($day && $start)
                {
                    $channels[]      = doctor_communication::create([
                        'doctor_id'     => $user->id,
                        'start_at'      => $start,
                        'end_at'        => $end,
                    ]);
                }
            }
        }

        //doctor intrests
        if($request->doctor_type != 'Trainee' && $request->interests && is_array($request->interests))
        {
            $interests =[];
            foreach ($request->interests as $key => $value)
            {
                $interests[] = new interest([
                    'name'  => $value
                ]);
            }
            if(count($interests))
            {
                $user->interests()->saveMany($interests);
            }

        }


        return back()->with(['success'=>__('global.success_save')]);

    }
}
