<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseInterview extends Model
{
   protected $fillable = [
    'description',
    'course_id',
    'user_id',
   ];
  public function course(){
    return $this->belongsTo(Course::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function interviewQuestions(){
    return $this->hasMany(InterviewQuestion::class);
  }
  public function studentInterview(){
    return $this->hasMany(StudentInterview::class);
  }

}
