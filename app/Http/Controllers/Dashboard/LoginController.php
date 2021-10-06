<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Dashboard\LoginRequest;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;

    class LoginController extends Controller
    {
        /**
         * @return Application|Factory|View
         */
        public function getLogin()
        {
            return view('dashboard.auth.login');
        }

        /**
         * @param LoginRequest $request
         *
         * @return RedirectResponse
         */
        public function login(LoginRequest $request): RedirectResponse
        {
            $remember_me=$request->has('remember_me');

            if (auth()->guard('admins')
                ->attempt([
                    'email'=>$request->input("email"),
                    'password'=>$request->input("password"),
                ], $remember_me)) {
                notify()->success('تم الدخول بنجاح  ');
                return redirect()->route('dashboard.home')
                    ->with('status', 'تم تسجيل الدخول بنجاح');
            }
            notify()->error('خطا في البيانات  برجاء المجاولة مجدا ', 'Error');
            return redirect()->back()->with(['error'=>'هناك خطا بالبيانات']);
        }

        /**
         * @return RedirectResponse
         */
        public function logout(): RedirectResponse
        {
            Auth::guard('admins')->logout();
            Auth::logout();
            return redirect()
                ->route('dashboard.login')
                ->with('status', 'تم تسجيل الخروج بنجاح!');
        }
    }
