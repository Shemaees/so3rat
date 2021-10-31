<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }

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
            $doctors=$doctors->with('doctorProfile','channels','communications','interests')->get();
            // dd($doctors);
        return view('front.patient.search', compact('doctors'));
    }
}
