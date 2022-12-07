<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_id',
        'shift_id',
        'created',
        'min_start_time',
        'start_time',
        'max_start_time',
        'min_end_time',
        'end_time',
        'max_end_time',
        'break_time',
        'extra_hours',
        'publish',
    ];

    public function user_schedule()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }
    
    public function shift()
    {
        return $this->belongsTo(Shift::class,'shift_id','id');

    }
}
