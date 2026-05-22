<?php

namespace App\Filament\Resources\CourseStatuses\Pages;

use App\Filament\Resources\CourseStatuses\CourseStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourseStatuses extends ListRecords
{
    protected static string $resource = CourseStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
