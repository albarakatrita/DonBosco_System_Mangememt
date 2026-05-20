<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
       protected $fillable = [
    'title',
    'form_type',
    'course_id',
    'user_id'
   ];
   public function course(){
    return $this->belongsTo(Course::class);
   }
   public function user(){
    return $this->belongsTo(User::class);
   }
   public function courseRegisterationField(){
    return $this->hasMany(CourseRegisterationField::class);
   }
   public function studentApplication(){
    return $this->hasMany(StudentApplication::class);
   }
}
