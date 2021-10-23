<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interest extends Model
{
    use HasFactory;
    protected $table = "interests";
    protected $fillable =['user_id','name'];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
