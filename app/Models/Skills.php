<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill',
        'user_id'
    ];

    public function user_skill()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
