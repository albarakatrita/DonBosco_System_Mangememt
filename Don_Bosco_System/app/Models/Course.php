<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    'title',
    'description',
    'start_date',
    'required_number',
    'has_interview',
    'user_id',
    'course_status_id',
    'user_id',
    'donor_id'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function donor(){
        return $this->belongsTo(Donor::class);
    }
    public function courseStatus(){
        return $this->belongsTo(CourseStatus::class);
    }
  public function form(){
    return $this->hasMany(Form::class);
  }
  public function courseInterviews(){
    return $this->hasMany(CourseInterview::class);
  }
  public function studentCourseEnrollment(){
    return $this->hasMany(StudentCourseEnrollment::class);

}
}
