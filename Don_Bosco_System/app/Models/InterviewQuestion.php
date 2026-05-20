<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnArgument;

class InterviewQuestion extends Model
{
    protected $fillable = [
     'type',
        'course_interview',
        'order',
        'optione',
        'question_text'


    ];
    public function courseInterview(){
        return $this->belongsTo(CourseInterview::class);
    }

}
