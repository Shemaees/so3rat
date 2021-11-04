<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class favourites extends Model
{
    protected $fillable = ['patient_id','doctor_id'];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
   
}