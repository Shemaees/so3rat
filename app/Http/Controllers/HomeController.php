<?php

namespace App\Http\Controllers;

use App\Models\contact_us;
use App\Models\doctor_category;
use App\Models\meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

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
        $doctors_favourites=User::doctor()->active()->with('doctorProfile')->get();
        $categories=doctor_category::withCount('User')->get();
        return view('home',compact('categories','doctors_favourites'));
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
    public function search_by_category($id)
    {
        $doctors = User::doctor()->active()->where('category_id',$id)->with('doctorProfile','channels','communications','interests')->get();
        return view('front.patient.search', compact('doctors'));
    }

    public function meetings()
    {
        $meetings = meeting::orderBy('to_date', 'DESC')->get()->take(15);
        return view('front.meetings', compact('meetings'));
    }
    public function save_contactus(Request $request)
    {
        $contact_us=new contact_us();
        $contact_us->name=$request->name;
        $contact_us->email=$request->email;
        $contact_us->phone=$request->phone;
        $contact_us->message=$request->message;
        $contact_us->save();
        return redirect()->back()->with(['success'=>'تم الارسال بنجاح']);
    }
}
