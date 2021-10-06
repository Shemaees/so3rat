<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Dashboard\Store\StoreAdminRequest;
    use App\Http\Requests\Dashboard\Update\UpdatePasswordRequest;
    use App\Http\Requests\Dashboard\Update\UpdateRolesRequest;
    use App\Models\Admin;
    use Exception;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Hash;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use function view;

    class AdminController extends Controller
    {

        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index(Request $request)
        {
            $admins=Admin::where('id', '!=', auth()->id())->latest()->paginate(10);
            $roles=Role::all();
            $permissions = Permission::all();
            $permissionGroups=Permission::all()->groupBy('group');
            $trashAdmins=Admin::onlyTrashed()->latest()->get();
            return view('dashboard.admins.index', compact('admins', 'roles','permissions', 'permissionGroups', 'trashAdmins'));
        }
        public function trashed()
        {
            $roles=Role::all();
            $permissions = Permission::all();
            $permissionGroups=Permission::all()->groupBy('group');
            $trashAdmins=Admin::onlyTrashed()->latest()->get();
            return view('dashboard.admins.trashed', compact( 'roles','permissions', 'permissionGroups', 'trashAdmins'));
        }

        public function profile()
        {
            $admin=auth()->user();
//            dd($admin);
            return view('dashboard.admins.profile',compact('admin'));


        }

        /**
         * Store a newly created resource in storage.
         *
         * @param StoreAdminRequest $request
         *
         * @return JsonResponse
         */
        public function store(StoreAdminRequest $request): JsonResponse
        {
            //
            try {
                $admin=new Admin();
                $admin->name=$request->name;
                $admin->email=$request->email;
                $admin->password=Hash::make($request->password);

                if ($admin->save()) {
                    $roles=$request->input('roles') ? $request->input('roles') : [];
                    $admin->roles()->attach((array)$roles);
                    return $this->returnJsonResponse(__('global.success_save'));

                }
                else {
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);
                }
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [$e->getMessage()], FALSE, '$e');
            }
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param int     $id
         *
         * @return void
         */
        public function update(UpdateRolesRequest $request, Admin $admin)
        {

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Admin $admin
         *
         * @return RedirectResponse
         */
        public function destroy(Admin $admin)
        {
            $admin->delete();
            return redirect()->route('dashboard.admins.index');
        }

        /**
         * Delete all selected admin at once.
         *
         * @param Request $request
         *
         * @return Response
         */
        public function massDestroy(Request $request)
        {

            Admin::whereIn('id', request('ids'))->delete();

            return response()->noContent();
        }



        public function getPassword(Admin $admin)
        {
            return \view('dashboard.admins.password', compact('admin'));
        }

        public function changePassword(UpdatePasswordRequest $request, Admin $admin)
        {
            try {
                $admin->password=Hash::make($request->password);
//                $admin->password = $request->password;

                if ($admin->update())
                {
                    notify()->success(__('dashboard/admin.status_changed'));
                    return redirect()->route('dashboard.admins.profile')->with(['success'=>__('global.is_updated')]);
                }
                else
                {
                    notify()->error(__('global.try_again'));
                    return redirect()->route('dashboard.admins.profile')->with(['error'=> __('global.try_again')]);
                }
            } catch (\Exception $ex) {
                notify()->error(__('global.try_again'));
                return redirect()->route('dashboard.admins.profile')->with(['error'=> __('global.try_again')]);
            }
        }




        public function changeStatus(Admin $admin)
        {
            try {
                $status=$admin->active == 0 ? 1 : 0;

                $admin->update(['status'=>$status]);

                notify()->success(__('dashboard/admin.status_changed'));
                return redirect()->route('dashboard.admins.index')->with(['success'=>__('dashboard/admin.status_changed')]);


            } catch (Exception $e) {
                notify()->error(__('global.try_again'));
                return redirect()->route('dashboard.admins.index')->with(['error'=>__('global.try_again')]);
            }
        }

        public function addPermission(Request $request, Admin $admin)
        {
            try {
                $admin->permissions()->attach((array)$request->permissions);
                return $this->returnJsonResponse(__('global.success_save'));
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [$e->getMessage()], FALSE, '$e');
            }
        }

        public function addRole(Request $request, Admin $admin)
        {
            try {
                $roles=$request->input('roles') ? $request->input('roles') : [];
                $admin->roles()->attach((array)$roles);
                return $this->returnJsonResponse(__('global.success_save'));
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [$e->getMessage()], FALSE, '$e');
            }
        }


        public function forceDelete($id)
        {
            $admin=Admin::withTrashed()->find($id);
            if (!$admin && !$admin->forceDelete()) {
                notify()->error(__('global.try_again'));
                return redirect()->route('dashboard.admins.index')->with(['error'=>__('global.try_again')]);

            }
            notify()->success(__('dashboard/admin.restore'));
            return redirect()->route('dashboard.admins.index')->with(['success'=>__('dashboard/admin.restore')]);
        }

        public function restore($id)
        {
            try {
                $admin=Admin::onlyTrashed()->find($id);
                if (!$admin && !$admin->restore()) {
                    notify()->error(__('global.try_again'));
                    return redirect()->route('dashboard.admins.index')->with(['error'=>__('global.try_again')]);
                }
                $admin->restore();
                notify()->success(__('dashboard/admin.restore'));
                return redirect()->route('dashboard.admins.index')->with(['success'=>__('dashboard/admin.restore')]);
            } catch (Exception $e) {

                notify()->error(__('global.try_again'));
                return redirect()->route('dashboard.admins.index')->with(['error'=>__('global.try_again')]);
            }
        }
    }
