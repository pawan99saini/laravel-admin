<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'created',
        'status',
        
        
        
    ];

    public function staff()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function matrix_qualification()
    {
        return $this->hasMany(MatrixQualification::class);
    }
    
    public function matrix_course()
    {
        return $this->hasMany(MatrixCourse::class);
    }
}
