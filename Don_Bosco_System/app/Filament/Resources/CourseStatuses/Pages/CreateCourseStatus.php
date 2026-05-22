<?php

namespace App\Filament\Resources\CourseStatuses\Pages;

use App\Filament\Resources\CourseStatuses\CourseStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseStatus extends CreateRecord
{
    protected static string $resource = CourseStatusResource::class;
}
