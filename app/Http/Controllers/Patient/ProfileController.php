<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\DoctorPatientRequest;
use App\Models\PatientProfile;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */


    public function profile_setting()
    {
        $user=Auth::user();
        return view('front.patient.profile-settings',compact('user'));
    }

    public function save_profile_setting(Request $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $user=Auth::user();
            $profile = Auth::user()->patientProfile;
            $user->name=$request->first_name.' '.$request->last_name;
            $user->birthdate=$request->birthdate;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->save();
            $profile->blood_group=$request->blood_group;
            $profile->address=$request->address;
            $profile->city=$request->city;
            $profile->country=$request->country;
            $profile->zip_code=$request->zip;
            $profile->save();
            return back()->with(['success'=>__('dashboard/patient.update')]);
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }

    }
}
