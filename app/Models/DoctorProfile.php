<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $timestamps = false;

    protected $fillable = [
        'doctor_type',
        'country',
        'city',
        'qualification',
        'intrests',
        'about',
        'medical_license_number',
        'communication_types',
        'communication_way',
        'accept_promotions',
        'follow_up_fee',
        'training_fee',
        'training_program',
        'classification_certificate',
        'bank_statements_certificate',
        'university_qualification',
        'experience_certificate',
        'specialty_certificate',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
