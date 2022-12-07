<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixCourse extends Model
{
    use HasFactory;

    public function staff_course()
    {
        return $this->belongsTo(Matrix::class,'matrix_id','id');
    }
    
}
