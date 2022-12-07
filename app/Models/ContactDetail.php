<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contact_detail'
    ];
    public function user_contact()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
