<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRegisterationField extends Model
{
       protected $fillable = [
         'label',
         'name',
         'type',
           'required',
           'oder',
           'options',
           'placeholde',
           'form_id'



    ];
    public function form(){
        return $this->belongsTo(Form::class);
    }
    public function applicationAnswer(){
        return $this->hasMany(Application_Answer::class);
    }
}
