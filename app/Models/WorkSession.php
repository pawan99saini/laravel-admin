<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'attendance_id',
        'start',
        'end',
        'type',
        ];

        public function att()
    {
        return $this->belongsTo(Attendance::class,'attendance_id','id');
    }
}
