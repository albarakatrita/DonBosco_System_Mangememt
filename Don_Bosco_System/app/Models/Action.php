<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
protected $fillable = [
    'label',
    'key'
];
public function activityLog(){
    return $this->hasMany(ActivityLog::class);
}
}
