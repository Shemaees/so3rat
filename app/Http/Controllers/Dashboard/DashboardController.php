<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\Admin;
    use App\Models\Order;
    use App\Models\Subscription;
    use App\Models\SubscriptionUserVisit;
    use App\Models\TimeSlot;
    use App\Models\User;
    use App\Models\UserSubscriptionVisit;
    use App\Models\Visit;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class DashboardController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {

//            dd($upcomingOrders);
            return view('dashboard.dashboard');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return void
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
         * @param Admin $admin
         *
         * @return Application|Factory|View
         */
        public function show(Order $order)
        {

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Admin $admin
         *
         * @return Response
         */
        public function edit(Admin $admin)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param Admin   $admin
         *
         * @return Response
         */
        public function update(Request $request, Admin $admin)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Admin $admin
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy(Order $order)
        {

        }


    }
