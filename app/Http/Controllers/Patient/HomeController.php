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

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function search(Request $request): Renderable
    {
        $doctors = User::doctor()->active()
            ->when($request->gender, function ($q) use ($request) {
                return $q->where('gender', $request->gender);
            })->when($request->country, function ($q) use ($request) {
                return $q->whereRelation('doctorProfile', 'country', $request->country);
            })->when($request->city, function ($q) use ($request) {
                return $q->whereRelation('doctorProfile', 'city', $request->city);
            })->when($request->country, function ($q) use ($request) {
                return $q->whereRelation('profile', 'country', $request->country);
            })->when($request->intrests, function ($q) use ($request) {
                return $q->whereHas('doctorProfile', function ($q) use ($request) {
                    return $q->where('intrests', 'like', '%'.$request->intrests.'%')
                        ->orWhere('intrests', 'like', '%'.$request->intrests)
                        ->orWhere('intrests', 'like', $request->intrests.'%');
                });
            });
        return view('front.search', compact('doctors'));
    }

    public function patientProfileComplete()
    {
        return view('front.patient.complete');
    }
    public function patient_dashboard()
    {
        $requests=DoctorPatientRequest::with('doctor.doctorProfile')->where('patient_id',Auth::user()->id)->get();
        return view('front.patient.patient-dashboard',compact('requests'));
    }
    public function doctor_patient_profile($id)
    {
        $doctor=User::with('interests','doctorProfile','communications')->find($id);
        // dd($doctor);
        return view('front.patient.doctor-profile',compact('doctor'));
    }
    public function booking($id)
    {
        $user=User::with('doctorProfile')->find($id);
        return view('front.booking.booking',compact('user'));
    }
    public function bookingsuccess($id)
    {
        if ($id) {
            $booking=DoctorPatientRequest::with('doctor')->find($id);
            return view('front.booking.booking-success',compact('booking'));
        }else{
            return back();
        }

    }
    public function savebooking(Request $request)
    {

        try {
            $doctor_patient_requests=new DoctorPatientRequest();
            $doctor_patient_requests->doctor_id=$request->doctor_id;
            $doctor_patient_requests->Follow_Up=$request->follow_up;
            $doctor_patient_requests->patient_id=Auth::user()->id;
            $doctor_patient_requests->save();
            return redirect()->route('booking-success',[$doctor_patient_requests->id]);

        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }

    }

    public function patientProfileCompleteStore(Request $request): RedirectResponse
    {
        if(in_array('other', $request->history)) {
            $request->history  = array_replace($request->history,
                array_fill_keys(
                    array_keys($request->history, 'other'),
                    $request->history_other
                )
            );
        }
        // dd($request->all());
        $user=auth()->user();
        $user->gender=$request->gender;
        $user->birthdate=$request->birthdate;
        $user->save();
        $profile = new PatientProfile();
        $profile->user_id = auth()->id();
        $profile->length = $request->length;
        $profile->blood_group = $request->blood_group;
        $profile->country = $request->country;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->zip_code = $request->zip;
        $profile->weight = $request->weight;
        $profile->highest_weight = $request->highest_weight;
        $profile->lowest_weight = $request->lowest_weight;
        $profile->usual_weight = $request->usual_weight;
        $profile->history = implode(',', $request->history);
        $profile->usual_medicines = $request->usual_medicines== 'yes' ? $request->usual_medicines_other : null;
        $profile->allergenic_foods = $request->allergenic_foods == 'yes' ? $request->allergenic_foods_selected : null;
        $profile->meals_number = $request->meals_number;
        $profile->meals_order = $request->meals_order;
        $profile->average_sleeping_hours = $request->average_sleeping_hours;
        $profile->cups_of_water_daily = $request->cups_of_water_daily;
        $profile->sport_activities = $request->sport_activities;
        $profile->favorite_meals = $request->favorite_meals;
        $profile->unfavorite_meals = $request->unfavorite_meals;
        $profile->carbohydrates_favorite = $request->carbohydrates_favorite;
        $profile->vegetables_favorite = $request->vegetables_favorite;
        $profile->fruits_favorite = $request->fruits_favorite;
        $profile->dairy_products_favorite = $request->dairy_products_favorite;
        $profile->meat_favorite = $request->meat_favorite;
        $profile->fats_favorite = $request->fats_favorite;
        $profile->carbohydrates_unFavorite = $request->carbohydrates_unFavorite;
        $profile->vegetables_unFavorite = $request->vegetables_unFavorite;
        $profile->fruits_unFavorite = $request->fruits_unFavorite;
        $profile->dairy_products_unFavorite = $request->dairy_products_unFavorite;
        $profile->meat_unFavorite = $request->meat_unFavorite;
        $profile->fats_unFavorite = $request->fats_unFavorite;
        $profile->health_goal = $request->health_goal;
        $profile->motivation = $request->motivation;
        $profile->confidence = $request->confidence;
        $profile->nutritionists_number_worked_with_before = $request->nutritionists_number_worked_with_before;
        $profile->lost_weight_without_planning_or_knowing_reasons = $request->lost_weight_without_planning_or_knowing_reasons;
        $profile->save();
        if (auth()->user()->status !== 'Active') {
            $msg = auth()->user()->status;
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('register')->with(['error' => $msg]);
        }
        else
            return redirect()->route('home');
    }
}
