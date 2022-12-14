<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address'
    ];

    public function user_address()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
