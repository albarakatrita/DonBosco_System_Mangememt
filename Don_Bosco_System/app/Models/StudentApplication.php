<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
protected $fillable = [
    'student_id',
    'form_id',
    'application_name',
    'status'
];
public function student(){
    return $this->belongsTo(Student::class);
}
public function form(){
    return $this->belongsTo(Form::class);
}
}
