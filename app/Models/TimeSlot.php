<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlot extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'day',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'datetime:H:i:s',
        'to' => 'datetime:H:i:s',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function scopeBetween($query, $from, $to)
    {
        return $query->whereDate([
            'from'  =>  $from,
            'to'    =>  $to
        ]);
    }
}
