<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Dashboard\Store\StoreRolesRequest;
    use App\Http\Requests\Dashboard\Update\UpdateRolesRequest;
    use Exception;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\View\View;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class RoleController extends Controller
    {
        public function index()
        {
            $roles=Role::paginate(15);
            //        $permissions = Permission::get();
            $permissionGroups=Permission::all()->groupBy('group');

            //        dd($permissions->groupBy('group'));
            return view('dashboard.roles.index', compact('roles', 'permissionGroups'));
        }

        /**
         * Store a newly created Role in storage.
         *
         * @param StoreRolesRequest $request
         *
         * @return JsonResponse
         */
        public function store(StoreRolesRequest $request)
        {
            try {

                $role=new Role();
                $role->name=$request->name;
                //            $role->group = $request->group;
                $role->guard_name='dashboard';

                if ($role->save()) {
                    $role->permissions()->attach((array)$request->permissions);
                    return $this->returnJsonResponse(__('global.success_save'), [$role->permissions()]);

                }
                else {
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);
                }
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [$e->getMessage()], FALSE, 215);
            }
        }


        /**
         * Show the form for editing Role.
         *
         * @param Role $role
         *
         * @return Application|Factory|\Illuminate\Contracts\View\View
         */
        public function edit( $role)
        {
            $role=Role::find($role);
            $permissions=Permission::get();

            return view('dashboard.roles.edit', compact('role', 'permissions'));
        }

        /**
         * Update Role in storage.
         *
         * @param UpdateRolesRequest $request
         * @param Role               $role
         *
         * @return RedirectResponse
         */
        public function update(UpdateRolesRequest $request, $role)
        {
            $role = ($role) ? $role : $request->id;
            $role=Role::find($role);
            $role->update($request->except(['permission','id']));

            try {
                if ($role->update()) {
                  
                    return $this->returnJsonResponse(__('global.success_save'));
                    
                    return redirect()->route('dashboard.roles.index')
                    ->with(['success'=>__('global.success_save')]);
                }
                else {
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);

                    notify()->error(__('global.error_save'));
                     return redirect()->back()->with(['error'=>__('global.error_save')]);                }

            }
            catch (Exception $e) 
            {
                return $this->returnJsonResponse(__('global.data_error'), [], FALSE, 215);
                return $e;
            }
        }

        public function show( $role)
        {
            $role               =   Role::find($role);
            //$permissions      =   $role->permissions;
            //$permissionGroups =   Permission::all()->groupBy('group');
            $rolePermissions    =   $role->permissions;

            return view('dashboard.roles.show', compact('rolePermissions', 'role'));
        }


        /**
         * Remove Role from storage.
         *
         * @param Role $role
         *
         * @return RedirectResponse
         * @throws Exception
         */
        public function destroy(Role $role)
        {
            $role->delete();

            return redirect()->route('dashboard.roles.index');
        }

        /**
         * Delete all selected Role at once.
         *
         * @param Request $request
         *
         * @return Response
         */
        public function massDestroy(Request $request)
        {
            Role::whereIn('id', request('ids'))->delete();

            return response()->noContent();
        }
    }
