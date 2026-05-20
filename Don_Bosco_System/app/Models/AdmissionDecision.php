<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionDecision extends Model
{
protected $fillable = [
    'final_decision',
    'reason',
    'student_application_id',
    'user_id',
    'notes',

];
public function user(){
    return $this->belongsTo(User::class);
}
public function studentApplication(){
    return $this->belongsTo(StudentApplication::class);
}
}
