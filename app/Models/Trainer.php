<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
        'phone',
        'description',
        'status',   
    ];

    public function staff()
    {
        return $this->hasMany(Training::class);
    }
}
