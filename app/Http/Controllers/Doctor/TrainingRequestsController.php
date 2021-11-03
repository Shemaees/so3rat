<?php

    namespace App\Http\Controllers\Doctor;

    use App\Models\trainingRequest;
    use App\Models\TimeSlot;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Controller;
    use Auth;

    class TrainingRequestsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $userRequests = trainingRequest::where('trainer_id' , Auth::id())
            ->orWhere('trainee_id' , Auth::id())
            ->with('trainer','trainee')->paginate(15);//where('status' , '!=','Rejected')->
            $page_title = __('front/request.TrainingRequests');
            return view('front.doctor.trainingRequests.index',compact('userRequests','page_title'));
        }

        public function rejected(){
            $nonActiveRequests = trainingRequest::where('status','Rejected')->with('trainer','trainee')->paginate(15);
            return view('front.doctor.trainingRequests.rejected',compact('nonActiveRequests'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */

        public function show($request_id){
            $requests = trainingRequest::find($request_id);
            return view('front.doctor.trainingRequests.show',compact('requests'));
        }
      
        public function changeStatus( $request_id , $status)
        {
            try 
            {
                $request    =   trainingRequest::find($request_id);
                // $status     =   $request->status == 'Accepted' ? 'Pending' : 'Accepted';
                if($status)
                {
                    $request->update(['status'=>$status]);
                    notify()->success(__('dashboard/requests.status_changed'));
                    return back()->with(['success'=>__('dashboard/requests.status_changed')]);
                }
            } catch (Exception $e) {
                notify()->error(__('global.try_again'));
                return redirect()->route('front.doctor.trainingRequests.index')->with(['error'=>__('global.try_again')]);
            }
        }

        public function add()
        {
            $doctors = User::where('user_type' , 'Doctor')->where('id' , '!=' , Auth::id())
            ->whereHas('doctorProfile' , function($query){
                $query->where('doctor_type' , '!=' , 'Trainee');
            })->get();
            return view('front.doctor.trainingRequests.add',compact('doctors'));
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

        public function SendRequest(User $trainer)
        {
            $trainee = Auth::user();
            $status = null;
            if($trainee && $trainer && @$trainee->profile->doctor_type == 'Trainee' && @$trainer->profile->doctor_type != 'Trainee' )
            {
                $request = trainingRequest::create([
                    "trainee_id"  => $trainee->id ,
                    "trainer_id"  =>  $trainer->id,
                    "cost"        =>  $trainee->profile->training_fee
                ]);
                return redirect()->route('front.doctor.trainingRequests.success',$request->id)->with(['success'=>__('front/request.request_send')]);
            }
            return redirect()->route('front.doctor.trainingRequests.failed');
        }

        public function requestSuccess(trainingRequest $request)
        {
            if($request && $request->trainee_id == Auth::id())
            {
                return view('front.doctor.trainingRequests.success')->with(['success'=>__('front/request.request_send') , 'request' => $request]);
            }
            return back();
        }

        public function requestfailed()
        {
            $user = Auth::user();
            $last_request = $user->traineeRequests->sortByDesc('id')->first();
            if($last_request && $last_request->status == 'Rejected')
            {
                return view('front.doctor.trainingRequests.failed');
            }
            return back();
        }
    }
