<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'shift_name',
        'min_start_time',
        'start_time',
        'max_start_time',
        'min_end_time',
        'end_time',
        'max_end_time',
        'break_time',
        'recurring_shift',
        'indefinite',
        'repeat',
        'week',
        'end_date',
        'tag',
        'note',
    ];

    public function shift_schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
