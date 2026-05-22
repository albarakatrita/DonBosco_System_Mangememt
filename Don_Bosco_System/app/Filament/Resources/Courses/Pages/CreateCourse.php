<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

   // for usre auth
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = Auth::id();

    return $data;
}}
