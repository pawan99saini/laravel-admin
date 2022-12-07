<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'hours',
        'created',
        'description',
        'status',   
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
