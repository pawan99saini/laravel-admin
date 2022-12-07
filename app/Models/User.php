<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SpatieLogsActivity;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'api_token',
        'password',
        'phone',
        'department_id',
        'position',
        'start_date',
        'end_date',
        'avatar',
        'gender',
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get a fullname combination of first_name and last_name
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->info) {
            return asset($this->info->avatar_url);
        }

        return asset(theme()->getMediaUrlPath().'avatars/blank.png');
    }

    /**
     * User relation to info model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }
    
    public function attendance()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function timesheet()
    {
        return $this->hasMany(Timesheet::class);
    }
    
    public function traning()
    {
        return $this->belongsToMany(Training::class);
    }
    
    public function matrix()
    {
        return $this->hasMany(Matrix::class);
    }
    
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
    
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    
    public function contact_details()
    {
        return $this->hasMany(ContactDetail::class);
    }
    
    public function qualification()
    {
        return $this->hasMany(Qualification::class);
    }
    public function skills()
    {
        return $this->hasMany(Skills::class);
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');

    }
}
