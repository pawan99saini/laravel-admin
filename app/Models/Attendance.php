<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'created',
        'time_in',
        'time_out',
        'break',
        'production',
        'overtime'
    ];

    public function user_att()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function sessions()
    {
        return $this->hasMany(WorkSession::class);
    }

}
