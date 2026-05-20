<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
    'full_name',
    'email',
    'phone',
    'password',
    'age',
    'region',
    'education',
    'specialization',
    'graduation_year'
  ];
  public function studentApplication(){
    return $this->hasMany(StudentApplication::class);
  }
  public function studentInterview(){
    return $this->hasMany(StudentInterview::class);
  }
}
