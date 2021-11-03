<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\favourites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function check_favourite($id)
    {
        $favourite=new favourites();
        $favourite->patient_id=Auth::user()->id;
        $favourite->doctor_id=$id;
        $favourite->save();
        return back();
    }
    public function favourites()
    {
        $favourite_id=Auth::user()->favourites->pluck('doctor_id');
        $doctors_favourites=User::whereIn('id',$favourite_id)->with('doctorProfile')->get();
       return view('front.patient.favourites',compact('doctors_favourites'));
    }
}
