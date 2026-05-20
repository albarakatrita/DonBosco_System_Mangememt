<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInterviewAnswer extends Model
{
    protected $fillable = [
        'answer',
        'student_interview_id',
        'interview_question_id'
    ];
    public function studentInterview(){
        return $this->belongsTo(StudentInterview::class);
    }
    public function interviewQuestion(){
        return $this->belongsTo(InterviewQuestion::class);
    }

}


