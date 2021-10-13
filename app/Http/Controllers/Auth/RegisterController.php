<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use App\Models\PatientProfile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'user_type' => ['required', 'string', 'in:Doctor,Patient',],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,NULL,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'unique:users,phone,NULL,NULL,deleted_at,NULL', 'regex:/^(\+?\(?[0-9]{2,3}\)?)([ -]?[0-9]{2,4}){3}$/', 'min:10', 'max:18'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
            'birthdate' => ['required', 'date_format:Y-m-d', 'before:today'],
//            'qualification' => ['required', 'string'],

            //if patient
            'length' => ['required_if:user_type:Patient', 'numeric', 'between:20,250.99'],
            'weight' => ['required_if:user_type:Patient', 'numeric', 'between:20,550.99'],
            'history' => ['required_if:user_type:Patient', 'string'],
            'usual_medicines' => ['required_if:user_type:Patient', 'string'],
            'allergenic_foods' => ['required_if:user_type:Patient', 'string'],
            'about_wieght' => ['required_if:user_type:Patient', 'string'],
            'meals_number' => ['required_if:user_type:Patient', 'numeric', 'min:1', 'max:15'],
            'meals_order' => ['required_if:user_type:Patient', 'string'],
            'average_sleeping_hours' => ['required_if:user_type:Patient', 'numeric', 'min:3', 'max:20'],
            'cups_of_water_daily' => ['required_if:user_type:Patient', 'numeric', 'min:0', 'max:250'],
            'sport_activities' => ['required_if:user_type:Patient', 'number', 'in:1.2,1.375,1.55,1.752'],
            'favorite_meals' => ['required_if:user_type:Patient', 'string'],
            'unfavorite_meals' => ['required_if:user_type:Patient', 'string'],
            'carbohydrates_favorite' => ['required_if:user_type:Patient', 'string'],
            'carbohydrates_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'vegetables_favorite' => ['required_if:user_type:Patient', 'string'],
            'vegetables_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'fruits_favorite' => ['required_if:user_type:Patient', 'string'],
            'fruits_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'dairy_products_favorite' => ['required_if:user_type:Patient', 'string'],
            'dairy_products_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'meat_favorite' => ['required_if:user_type:Patient', 'string'],
            'meat_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'fats_favorite' => ['required_if:user_type:Patient', 'string'],
            'fats_unFavorite' => ['required_if:user_type:Patient', 'string'],
            'health_goal' => ['required_if:user_type:Patient', 'string'],
            'motivation' => ['required_if:user_type:Patient', 'string'],
            'confidence' => ['required_if:user_type:Patient', 'string'],
            'nutritionists_number_worked_with_before' => ['required_if:user_type:Patient', 'numeric', 'min:0', 'max:20'],
            'lost_weight_without_planning_or_knowing_reasons' => ['required_if:user_type:Patient', 'numeric', 'in:0,1'],

            //if doctor
            'doctor_type' => ['required_if:user_type:Doctor', 'string', 'in:Trainee,Trainer.Follow up of patients'],
            'country' => ['required_if:user_type:Doctor', 'string', 'exists:countries,name'],
            'city' => ['required_if:user_type:Doctor', 'string'],
            'intrests' => ['required_if:user_type:Doctor', 'string'],
            'about' => ['required_if:user_type:Doctor', 'string'],
            'medical_license_number' => ['required_if:user_type:Doctor', 'numeric'],
            'communication_types' => ['required_if:user_type:Doctor', 'string'],
            'communication_way' => ['required_if:user_type:Doctor', 'string', 'in:Private,Group,Both'],
            'accept_promotions' => ['required_if:user_type:Doctor', 'string', 'in:Yes,No'],
            'follow_up_fee' => ['required_if:user_type:Doctor,doctor_type:Follow up of patients', 'numeric', 'between:0,9999.99'],
            'training_fee' => ['required_if:user_type:Doctor,doctor_type:Trainer', 'numeric', 'between:0,9999.99'],
            'training_program' => ['required_if:user_type:Doctor,doctor_type:Trainer', 'string'],
            'classification_certificate' => ['required_if:user_type:Doctor', 'string'],
            'bank_statements_certificate' => ['required_if:user_type:Doctor', 'string'],
            'university_qualification' => ['required_if:user_type:Doctor', 'string'],
            'experience_certificate' => ['required_if:user_type:Doctor', 'string'],
            'specialty_certificate' => ['required_if:user_type:Doctor', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function create(array $data): \Illuminate\Http\JsonResponse
    {
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->user_type = $data['user_type'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->photo = $data['photo'];
            $user->birthdate = Carbon::make($data['birthdate'])->toDateString();
            $user->password = Hash::make($data['password']);
            if ($user->save()) {
                if ($data['user_type'] == 'Doctor') {
                    $profile = new DoctorProfile();
                    $profile->doctor_type = $data['doctor_type'];
                    $profile->country = $data['country'];
                    $profile->city = $data['city'];
                    $profile->intrests = $data['intrests'];
                    $profile->about = $data['about'];
                    $profile->medical_license_number = $data['medical_license_number'];
                    $profile->communication_types = $data['communication_types'];
                    $profile->communication_way = $data['communication_way'];
                    $profile->accept_promotions = $data['accept_promotions'];
                    $profile->follow_up_fee = $data['follow_up_fee'];
                    $profile->training_fee = $data['training_fee'];
                    $profile->classification_certificate = $data['classification_certificate'];
                    $profile->bank_statements_certificate = $data['bank_statements_certificate'];
                    $profile->university_qualification = $data['university_qualification'];
                    $profile->experience_certificate = $data['experience_certificate'];
                    $profile->specialty_certificate = $data['specialty_certificate'];
                    $profile->training_program = $data['training_program'];
                } else {
                    $profile = new PatientProfile();
                    $profile->length = $data['length'];
                    $profile->weight = $data['weight'];
                    $profile->history = $data['history'];
                    $profile->usual_medicines = $data['usual_medicines'];
                    $profile->allergenic_foods = $data['allergenic_foods'];
                    $profile->about_wieght = $data['about_wieght'];
                    $profile->meals_number = $data['meals_number'];
                    $profile->meals_order = $data['meals_order'];
                    $profile->average_sleeping_hours = $data['average_sleeping_hours'];
                    $profile->cups_of_water_daily = $data['cups_of_water_daily'];
                    $profile->sport_activities = $data['sport_activities'];
                    $profile->favorite_meals = $data['favorite_meals'];
                    $profile->unfavorite_meals = $data['unfavorite_meals'];
                    $profile->carbohydrates_favorite = $data['carbohydrates_favorite'];
                    $profile->vegetables_favorite = $data['vegetables_favorite'];
                    $profile->fruits_favorite = $data['fruits_favorite'];
                    $profile->dairy_products_favorite = $data['dairy_products_favorite'];
                    $profile->meat_favorite = $data['meat_favorite'];
                    $profile->fats_favorite = $data['fats_favorite'];
                    $profile->carbohydrates_unFavorite = $data['carbohydrates_unFavorite'];
                    $profile->vegetables_unFavorite = $data['vegetables_unFavorite'];
                    $profile->fruits_unFavorite = $data['fruits_unFavorite'];
                    $profile->dairy_products_unFavorite = $data['dairy_products_unFavorite'];
                    $profile->meat_unFavorite = $data['meat_unFavorite'];
                    $profile->fats_unFavorite = $data['fats_unFavorite'];
                    $profile->health_goal = $data['health_goal'];
                    $profile->motivation = $data['motivation'];
                    $profile->confidence = $data['confidence'];
                    $profile->nutritionists_number_worked_with_before = $data['nutritionists_number_worked_with_before'];
                    $profile->lost_weight_without_planning_or_knowing_reasons = $data['lost_weight_without_planning_or_knowing_reasons'];
                }
                if ($profile->save())
                    return $user->with('profile')->first();
                else
                    return $this->returnJsonResponse(__('global.error_save'), [], FALSE, 213);
            }
        }
        catch (\Exception $e) {
            return $this->returnJsonResponse(__('global.data_error'), [$e->getMessage()], FALSE, '$e');
        }
        return redirect('front.index-3')->withSuccess('You have signed-in')  ;
    }
}
