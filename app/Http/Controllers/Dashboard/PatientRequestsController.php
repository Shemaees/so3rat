<?php

    namespace App\Http\Controllers\Dashboard;

use App\Models\DoctorPatientRequest;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Controller;

    class PatientRequestsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $userRequests = DoctorPatientRequest::where('status','Accepted')->with('doctor','patient')->paginate(15);
            return view('dashboard.requests.index',compact('userRequests'));
        }
        public function nonActive(){
            $nonActiveRequests = DoctorPatientRequest::where('status','!=','Accepted')->with('doctor','patient')->paginate(15);
            return view('dashboard.requests.non_active',compact('nonActiveRequests'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param TimeSlot $timeSlot
         *
         * @return Response
         */
        public function show($request)
        {
            $request=DoctorPatientRequest::with('doctor','patient')->find($request);
            return view('dashboard.requests.show',compact('request'));
        }
        public function changeStatus( $request)
        {

            try {
                $request=DoctorPatientRequest::find($request);
                $status=$request->status == 'Accepted' ? 'Pending' : 'Accepted';
                $request->update(['status'=>$status]);
                notify()->success(__('dashboard/requests.status_changed'));
                return redirect()->route('dashboard.requests.index')->with(['success'=>__('dashboard/requests.status_changed')]);


            } catch (Exception $e) {
                notify()->error(__('global.try_again'));
                return redirect()->route('dashboard.requests.index')->with(['error'=>__('global.try_again')]);
            }
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param TimeSlot $timeSlot
         *
         * @return Response
         */
        public function edit(TimeSlot $timeSlot)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request  $request
         * @param TimeSlot $timeSlot
         *
         * @return Response
         */
        public function update(Request $request, TimeSlot $timeSlot)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param TimeSlot $timeSlot
         *
         * @return Response
         */
        public function destroy(TimeSlot $timeSlot)
        {
            //
        }
    }
