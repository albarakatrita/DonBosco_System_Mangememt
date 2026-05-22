<?php

namespace App\Filament\Resources\CourseStatuses;

use App\Filament\Resources\CourseStatuses\Pages\CreateCourseStatus;
use App\Filament\Resources\CourseStatuses\Pages\EditCourseStatus;
use App\Filament\Resources\CourseStatuses\Pages\ListCourseStatuses;
use App\Filament\Resources\CourseStatuses\Schemas\CourseStatusForm;
use App\Filament\Resources\CourseStatuses\Tables\CourseStatusesTable;
use App\Models\CourseStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseStatusResource extends Resource
{
    protected static ?string $model = CourseStatus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'status_name';

    public static function form(Schema $schema): Schema
    {
        return CourseStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseStatusesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourseStatuses::route('/'),
            'create' => CreateCourseStatus::route('/create'),
            'edit' => EditCourseStatus::route('/{record}/edit'),
        ];
    }
}
