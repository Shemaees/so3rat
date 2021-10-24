<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class communication_channel extends Model
{
    use HasFactory;
    protected $table="communication_channels";
    protected $fillable =['user_id','channel_type','link'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
