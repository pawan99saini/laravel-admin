<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'from',
        'to',
        'type',
        'number_of_days',
        'remaning',
        'reason',
        'status',   
    ];

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class,'type','id');

    }
    
    public function userLeave()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }

}
