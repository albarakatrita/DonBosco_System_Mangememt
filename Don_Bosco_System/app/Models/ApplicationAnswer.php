<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationAnswer extends Model
{
    protected $fillable = [
        'student_application_id',
        'course_registeration_field_id',
        'answer'
    ];
    public function studentApplication(){
        return $this->belongsTo(StudentApplication::class);
    }
    public function courseRegisterationFields(){
       return $this->belongsTo(CourseRegisterationField::class, 'field_id');
}}
