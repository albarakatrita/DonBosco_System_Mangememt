<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    protected $fillable = [
    'status_name',
    'color',
   ];
  public function course(){
    return $this->hasMany(Course::class);
  }
}
