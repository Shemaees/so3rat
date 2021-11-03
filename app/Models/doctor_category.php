<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_category extends Model
{
    protected $fillable = ['name', 'photo'];
    public function User()
    {
        return $this->hasMany(User::class,'category_id');
    }
}
