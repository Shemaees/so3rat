<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
                return $q->whereRelation('doctorProfile', 'country', $request->country);
            })->when($request->intrests, function ($q) use ($request) {
                return $q->whereHas('doctorProfile', function ($q) use ($request) {
                    return $q->where('intrests', 'like', '%'.$request->intrests.'%')
                        ->orWhere('intrests', 'like', '%'.$request->intrests)
                        ->orWhere('intrests', 'like', $request->intrests.'%');
                });
            });
        return view('front.search', compact('doctors'));
    }
    public function index()
    {
        return view('front.doctor.doctor-dashboard');
    }

    public function doctorProfileComplete()
    {
        return view('front.patient.complete');
    }

    public function doctorProfileCompleteStore(Request $request)
    {
        return view('front.patient.complete');
    }
}
