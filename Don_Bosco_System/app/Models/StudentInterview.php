<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInterview extends Model
{
    protected $fillable = [
    'course_interview_id',
  '  user_id',
  'rating',
  'notes',
  'status',
   'interview_time',
   'student_id',
   'interview_date'

    ];
     public function user(){
        return $this->belongsTo(User::class);
     }
     public function student(){
        return $this->belongsTo(Student::class );
     }
     public function courseInterview(){
        return $this->belongsTo(CourseInterview::class);
     }

}
