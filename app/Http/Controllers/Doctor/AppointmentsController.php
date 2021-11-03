<?php

namespace App\Http\Controllers\Doctor;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\DoctorPatientRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppointmentsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */

    public function show()
    {
        $requests=DoctorPatientRequest::with('patient')->where('doctor_id',Auth::user()->id)->where('status','Pending')->get();
        return view('front.doctor.appointments',compact('requests'));
    }
    public function patient_profile($id)
    {
        $user=User::with('doctorProfile')->find($id);
        $requests=DoctorPatientRequest::with('doctor.doctorProfile')->where([['patient_id',$id],['doctor_id',Auth::user()->id]])->get();

         return view('front.patient.patient-profile',compact('requests','user'));
    }

    public function change_status($id,$status)
    {
       $requeststaues= DoctorPatientRequest::find($id);
       if($status)
       {
           $requeststaues->update(['status'=>$status]);
           notify()->success(__('dashboard/requests.status_changed'));
           if ($status=='confirmed') {
            return redirect()->route('booking-success');
           }
           return back()->with(['success'=>__('dashboard/requests.status_changed')]);
       }
    }

}
