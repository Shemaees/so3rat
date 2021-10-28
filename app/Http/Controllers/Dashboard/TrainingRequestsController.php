<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Models\trainingRequest;
    use App\Models\TimeSlot;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Controller;

    class TrainingRequestsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $userRequests = trainingRequest::with('trainer','trainee')->paginate(15);//where('status' , '!=','Rejected')->
            return view('dashboard.trainingRequests.index',compact('userRequests'));
        }

        public function rejected(){
            $nonActiveRequests = trainingRequest::where('status','Rejected')->with('trainer','trainee')->paginate(15);
            return view('dashboard.trainingRequests.rejected',compact('nonActiveRequests'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */

        public function show($request_id){
            $requests = trainingRequest::find($request_id);
            return view('dashboard.trainingRequests.show',compact('requests'));
        }


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
