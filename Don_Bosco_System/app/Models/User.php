<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'job_title'
    ];
    public function course(){
        return $this->hasMany(Course::class);
    }
    public function form(){
        return $this->hasMany(Form::class);
    }
 public function courseInterviews(){
 return $this->hasMany(CourseInterview::class);}
 public function studentInterview(){
    return $this->hasMany(StudentInterview::class);
 }
 public function admissionDecisions(){
    return $this->hasMany(AdmissionDecision::class);
 }
public function activit_logs(){
    return $this->hasMany(ActivityLog::class);
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
