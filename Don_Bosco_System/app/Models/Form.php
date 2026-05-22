<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Form extends Model
{
    protected $fillable = [
        'title',
        'form_type',
        'course_id',
        'user_id',
        'fixed_fields',
        'slug',
        'is_published',
        'published_at',
        'expires_at',
    ];

    protected $casts = [
        'fixed_fields' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fields()
    {
        return $this->hasMany(CourseRegisterationField::class)
            ->orderBy('order_index');
    }

    public function studentApplication()
    {
        return $this->hasMany(StudentApplication::class);
    }



    protected static function booted()
    {
        static::creating(function ($form) {

            if (empty($form->slug)) {

                $form->slug = Str::slug(
                    $form->title . '-' . uniqid()
                );
            }
        });
    }



    public function isOpen(): bool
    {

        if (!$this->is_published) {
            return false;
        }


        if (
            $this->expires_at &&
            Carbon::now()->gt($this->expires_at)
        ) {
            return false;
        }

        return true;
    }


    public function getAllFieldsForRender()
    {
        $fixedFields = collect($this->fixed_fields ?? [])
            ->map(function ($config) {

                $field = $config['field'] ?? null;

                return [
                    'source' => 'fixed',
                    'key' => $field,
                    'label' => ucfirst(str_replace('_', ' ', $field)),
                    'type' => 'text',
                    'required' => $config['required'] ?? false,
                    'visible' => $config['visible'] ?? true,
                    'order' => $config['order'] ?? 0,
                    'options' => [],
                      'placeholder' => $config['placeholder'] ?? '',
                ];
            });

        $dynamicFields = $this->fields->map(function ($field) {

            return [
                'source' => 'dynamic',
                'id' => $field->id,
                'label' => $field->label,
                'type' => $field->type,
                'required' => $field->required,
                'visible' => true,
                'order' => $field->order_index,
                'options' => $field->options ?? [],
                  'placeholder' => $config['placeholder'] ?? '',

            ];
        });

        return $fixedFields
            ->merge($dynamicFields)
            ->sortBy('order')
            ->values();
    }
}
