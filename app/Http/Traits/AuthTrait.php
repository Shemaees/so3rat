<?php


namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait AuthTrait
{

    /**
     * @param $request
     * @param $credentials
     *
     * @return JsonResponse
     */
    protected function createCredential($request,$credentials): JsonResponse
    {
        if (!$token = $this->guard()->attempt($credentials)) {
            return $this->returnJsonResponse('User or Password is invalid', [], FALSE, 209);
        }
            return $this->createNewToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function createNewToken(string $token): JsonResponse
    {
//        $user = $this->guard()->user();
//        $user->last_login_date = Carbon::now()->toDateTimeString();
//        $user->update();
        return $this->returnJsonResponse('You register successfully',
            [
                "credentials" =>[
                    'access_token'          => $token,
                    'token_type'            => 'bearer',
                    'expires_in'            =>  $this->guard()->factory()->getTTL() * 60*60*7
                ],
                "profile" => Student::find($this->guard()->id()),
            ],true,202
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return Guard|StatefulGuard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

    /**
     * @param $data
     *
     * @return JsonResponse
     */
    public function loginValidator($data): JsonResponse
    {
        $validator = Validator::make($data, [
            'email'=>'required|email|',
            'password'=>'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return $this->returnJsonResponse($validator->errors()->first(),
                [], FALSE, 212);
        }
    }




    /**
     * @param $data
     *
     * @return JsonResponse
     */
    public function updateProfileValidator($data): JsonResponse
    {
        $validator = Validator::make($data, [
            'mobile'=>'string|min:11|',
            'name'=>'string|min:3|max:55',
            'current_password'=>'string|min:3',
        ]);
        if ($validator->fails()) {
            return $this->returnJsonResponse($validator->errors(),
                [], FALSE, 212);
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param  mixed  $user
     *
     * @return JsonResponse
     */
    protected function authenticated(Request $request, $user): JsonResponse
    {
        //
        return new JsonResponse(['status'=>true,'message'=>'Success Added',new StudentResource($user)],200);
    }

    /**
     * The user has logged out of the application.
     *
     * @param Request $request
     *
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }
}
