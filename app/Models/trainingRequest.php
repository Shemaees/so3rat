<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainingRequest extends Model
{
    use HasFactory;
    protected $table="training_requests";
    protected $fillable = [
        'trainee_id',
        'trainer_id',
        'cost',
        'status',

    ];
    public function trainer()
    {
        return $this->belongsTo(User::class,'trainer_id');
    }
    public function trainee()
    {
        return $this->belongsTo(User::class,'trainee_id');
    }

}
