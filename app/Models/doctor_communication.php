<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_communication extends Model
{
    use HasFactory;
    protected $table = "doctor_communications";
    protected $fillable =['doctor_id','day','start_at','end_at'];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
}
