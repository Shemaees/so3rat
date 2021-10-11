<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'length',
        'weight',
        'qualification',
        'history',
        'usual_medicines',
        'allergenic_foods',
        'about_wieght',
        'meals_number',
        'meals_order',
        'average_sleeping_hours',
        'cups_of_water_daily',
        'sport_activities',
        'favorite_meals',
        'unfavorite_meals',
        'carbohydrates',
        'vegetables',
        'fruits',
        'meat',
        'fats',
        'health_goal',
        'motivation',
        'confidence',
        'nutritionists_number_worked_with_before',
        'lost_weight_without_planning_or_knowing_reasons',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
