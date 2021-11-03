<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use App\Models\PatientProfile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'type' => ['required', 'string', 'in:Doctor,Patient',],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,NULL,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'unique:users,phone,NULL,NULL,deleted_at,NULL', 'regex:/^(\+?\(?[0-9]{2,3}\)?)([ -]?[0-9]{2,4}){3}$/', 'min:10', 'max:18'],
            //'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
                //            'birthdate' => ['required', 'date_format:Y-m-d', 'before:today'],
                //            'qualification' => ['required', 'string'],

                //            //if patient
                //            'length' => ['required_if:user_type:Patient', 'numeric', 'between:20,250.99'],
                //            'weight' => ['required_if:user_type:Patient', 'numeric', 'between:20,550.99'],
                //            'history' => ['required_if:user_type:Patient', 'string'],
                //            'usual_medicines' => ['required_if:user_type:Patient', 'string'],
                //            'allergenic_foods' => ['required_if:user_type:Patient', 'string'],
                //            'about_wieght' => ['required_if:user_type:Patient', 'string'],
                //            'meals_number' => ['required_if:user_type:Patient', 'numeric', 'min:1', 'max:15'],
                //            'meals_order' => ['required_if:user_type:Patient', 'string'],
                //            'average_sleeping_hours' => ['required_if:user_type:Patient', 'numeric', 'min:3', 'max:20'],
                //            'cups_of_water_daily' => ['required_if:user_type:Patient', 'numeric', 'min:0', 'max:250'],
                //            'sport_activities' => ['required_if:user_type:Patient', 'number', 'in:1.2,1.375,1.55,1.752'],
                //            'favorite_meals' => ['required_if:user_type:Patient', 'string'],
                //            'unfavorite_meals' => ['required_if:user_type:Patient', 'string'],
                //            'carbohydrates_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'carbohydrates_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'vegetables_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'vegetables_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'fruits_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'fruits_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'dairy_products_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'dairy_products_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'meat_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'meat_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'fats_favorite' => ['required_if:user_type:Patient', 'string'],
                //            'fats_unFavorite' => ['required_if:user_type:Patient', 'string'],
                //            'health_goal' => ['required_if:user_type:Patient', 'string'],
                //            'motivation' => ['required_if:user_type:Patient', 'string'],
                //            'confidence' => ['required_if:user_type:Patient', 'string'],
                //            'nutritionists_number_worked_with_before' => ['required_if:user_type:Patient', 'numeric', 'min:0', 'max:20'],
                //            'lost_weight_without_planning_or_knowing_reasons' => ['required_if:user_type:Patient', 'numeric', 'in:0,1'],
                //
                //            //if doctor
                //            'doctor_type' => ['required_if:user_type:Doctor', 'string', 'in:Trainee,Trainer.Follow up of patients'],
                //            'country' => ['required_if:user_type:Doctor', 'string', 'exists:countries,name'],
                //            'city' => ['required_if:user_type:Doctor', 'string'],
                //            'intrests' => ['required_if:user_type:Doctor', 'string'],
                //            'about' => ['required_if:user_type:Doctor', 'string'],
                //            'medical_license_number' => ['required_if:user_type:Doctor', 'numeric'],
                //            'communication_types' => ['required_if:user_type:Doctor', 'string'],
                //            'communication_way' => ['required_if:user_type:Doctor', 'string', 'in:Private,Group,Both'],
                //            'accept_promotions' => ['required_if:user_type:Doctor', 'string', 'in:Yes,No'],
                //            'follow_up_fee' => ['required_if:user_type:Doctor,doctor_type:Follow up of patients', 'numeric', 'between:0,9999.99'],
                //            'training_fee' => ['required_if:user_type:Doctor,doctor_type:Trainer', 'numeric', 'between:0,9999.99'],
                //            'training_program' => ['required_if:user_type:Doctor,doctor_type:Trainer', 'string'],
                //            'classification_certificate' => ['required_if:user_type:Doctor', 'string'],
                //            'bank_statements_certificate' => ['required_if:user_type:Doctor', 'string'],
                //            'university_qualification' => ['required_if:user_type:Doctor', 'string'],
                //            'experience_certificate' => ['required_if:user_type:Doctor', 'string'],
            //            'specialty_certificate' => ['required_if:user_type:Doctor', 'string'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        try
        {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->user_type = $request->type;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phone;
            //$user->photo = FileImage($request->file('photo'), 'images/users/'.$request->name);
            //        $user->birthdate = Carbon::make($request['birthdate'])->toDateString();
            $user->password = Hash::make($request->password);
            $user->category_id = $request->category_id;
            $user->save();
            event(new Registered($user));

            $doctor_type                =    $request->doctor_type;
            $qualification              =    $request->qualification;
            $medical_license_number     =   $request->medical_license_number;
            if($request->type == 'Doctor' && $doctor_type)
            {
                DoctorProfile::create([
                    'user_id'                    => $user->id,
                    'doctor_type'                => $doctor_type,
                    'qualification'              => $qualification,
                    'medical_license_number'     => $medical_license_number,
                ]);
            }

            $this->guard()->login($user);

            DB::commit();

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect($this->redirectPath());
        }
        catch (\Throwable $th) {
			DB::rollback();
			return $th;
		}
    }
    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param  mixed  $user
     * @return RedirectResponse|void
     */
    protected function registered(Request $request, $user)
    {
        if ($user->profile == null)
            return $user->user_type == 'Patient' ? redirect()->route('complete_patient_profile', $user->id) : redirect()->route('complete_doctor_profile', $user->id);
        else if ($user->status !== 'Active') {
            $msg = $user->status;
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with(['error' => $user->status]);
        }

    }
}
