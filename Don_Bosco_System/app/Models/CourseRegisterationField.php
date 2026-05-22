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
           'order_index',
           'options',
           'placeholder',
           'form_id'



    ];
    protected $casts = [
        'options' => 'array',
        'required' => 'boolean',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function answers()
    {
        return $this->hasMany(ApplicationAnswer::class);
    }
protected static function booted()
{
    static::creating(function ($field) {

        if (!$field->form_id) {
            return;
        }

        $exists = static::where('form_id', $field->form_id)
            ->where('order_index', $field->order_index)
            ->exists();

        if ($exists || !$field->order_index) {

            $max = static::where('form_id', $field->form_id)
                ->max('order_index');

            $field->order_index = ($max ?? 0) + 1;
        }
    });
}
}
