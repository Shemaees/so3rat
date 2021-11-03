<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorPatientRequest extends Model
{
    use HasFactory;
    protected $table="doctor_patient_requests";
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'status',
        'Follow_Up',

    ];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class,'patient_id');
    }
}
