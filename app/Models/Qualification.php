<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'qualification',
        'user_id',
        'start_date',
        'end_date'
    ];

    public function user_qualification()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
