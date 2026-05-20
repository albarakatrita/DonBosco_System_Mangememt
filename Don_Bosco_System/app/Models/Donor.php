<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
   protected $fillable = [
     'name',
     'email',
    'phone',
    'donor_logo'
   ];
  public function course(){
    return $this->hasMany(Course::class);
  }
}
