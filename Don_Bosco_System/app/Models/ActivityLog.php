<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillabel=[
'metadata',
'related_id',
'entity_id',
'related_type',
'entity_type',
'action_id',
'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function action(){
        return $this->belongsTo(Action::class);
    }
}
