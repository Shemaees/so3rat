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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_type' => ['required', 'string', 'in:Doctor,Patient',],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,NULL,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'=> ['required','unique:users,phone,NULL,NULL,deleted_at,NULL','regex:/^(\+?\(?[0-9]{2,3}\)?)([ -]?[0-9]{2,4}){3}$/','min:10','max:18'],
            'birthdate' => ['required', 'date_format:Y-m-d', 'before:today'],
            'qualification' => ['required', 'string'],

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
            'carbohydrates' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
            'vegetables' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
            'fruits' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
            'dairy_products' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
            'meat' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
            'fats' => ['required_if:user_type:Patient', 'string', 'in:Favorite,Unfavorite'],
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
            'accept_promotions' => ['required_if:user_type:Doctor', 'string', 'in:Private,Group,Both'],
            'follow_up_fee' => ['required_if:user_type:Doctor,doctor_type:Follow up of patients', 'numeric', 'between:0,9999.99'],
            'training_fee' => ['required_if:user_type:Doctor,doctor_type:Trainer', 'numeric', 'between:0,9999.99'],
            'classification_certificate' => ['required_if:user_type:Doctor', 'string'],
            'bank_statements_certificate' => ['required_if:user_type:Doctor', 'string'],
            'university_qualification' => ['required_if:user_type:Doctor', 'string'],
            'experience_certificate' => ['required_if:user_type:Doctor', 'string'],
            'specialty_certificate' => ['required_if:user_type:Doctor', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Builder|null
     */
    protected function create(array $data): ?Builder
    {
        $user = new User();
        $user->name = $data['name'];
        $user->user_type = $data['user_type'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->birthdate = Carbon::make($data['birthdate'])->toDateString();
        $user->password = Hash::make($data['password']);
        if ($user->save()){
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
            }
            else{
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
                $profile->carbohydrates = $data['carbohydrates'];
                $profile->vegetables = $data['vegetables'];
                $profile->fruits = $data['fruits'];
                $profile->dairy_products = $data['dairy_products'];
                $profile->meat = $data['meat'];
                $profile->fats = $data['fats'];
                $profile->health_goal = $data['health_goal'];
                $profile->motivation = $data['motivation'];
                $profile->confidence = $data['confidence'];
                $profile->nutritionists_number_worked_with_before = $data['nutritionists_number_worked_with_before'];
                $profile->lost_weight_without_planning_or_knowing_reasons = $data['lost_weight_without_planning_or_knowing_reasons'];
            }
            if ($profile->save())
                return $user->with('profile')->first();
            else
                return null;
        }
        return null;
    }
}
