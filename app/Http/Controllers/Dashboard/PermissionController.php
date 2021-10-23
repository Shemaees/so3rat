<?php

    namespace App\Http\Controllers\Dashboard;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Dashboard\Update\UpdatePermissionsRequest;
    use Exception;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Spatie\Permission\Models\Permission;

    //use App\Http\Requests\Dashboard\Update\UpdatePermissionsRequest;

    class PermissionController extends Controller
    {
        public function index()
        {
            $permissionGroups=Permission::all()->groupBy('group');
            return view('dashboard.permissions.index', compact('permissionGroups'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         *
         * @return JsonResponse
         */
        public function store(Request $request): JsonResponse
        {
            try {
                $permission=new Permission();
                $permission->name=$request->name;
                // $permission->group=$request->group;
                // $permission->description=$request->description;
                $permission->guard_name='dashboard';

                if ($permission->save()) {
                    return $this->returnJsonResponse(__('global.success_save'));
                }
                else {
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);
                }
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [], FALSE, 215);
            }
        }

        /**
         * Update the specified resource in storage.
         *
         * @param UpdatePermissionsRequest $request
         * @param Permission               $permission
         *
         * @return JsonResponse
         */
        public function update(UpdatePermissionsRequest $request, Permission $permission): JsonResponse
        {
            try {
                $permission=new Permission();
                $permission->name=$request->name;
                $permission->group=$request->group;
                $permission->description=$request->description;
                $permission->guard_name='dashboard';

                if ($permission->save()) {
                    return $this->returnJsonResponse(__('global.success_save'));
                }
                else {
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);
                }
            } catch (Exception $e) {
                return $this->returnJsonResponse(__('global.data_error'), [], FALSE, 215);
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Permission $permission
         *
         * @return RedirectResponse
         * @throws Exception
         */
        public function destroy(Permission $permission)
        {
            $permission->delete();

            return redirect()->route('permission.index');
        }

        public function massDestroy(Request $request): Response
        {
            Permission::whereIn('id', request('ids'))->delete();

            return response()->noContent();
        }
    }
