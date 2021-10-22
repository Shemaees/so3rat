<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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
}
