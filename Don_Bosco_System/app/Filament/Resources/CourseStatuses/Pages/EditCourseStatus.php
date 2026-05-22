<?php

namespace App\Filament\Resources\CourseStatuses\Pages;

use App\Filament\Resources\CourseStatuses\CourseStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseStatus extends EditRecord
{
    protected static string $resource = CourseStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
