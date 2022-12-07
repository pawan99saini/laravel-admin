<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'trainer_id',
        'cost',
        'description',
        'start_date',
        'end_date',
        'status'
    ];

    public function employee()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function type()
    {
        return $this->belongsTo(TrainingType::class);
    }
}
