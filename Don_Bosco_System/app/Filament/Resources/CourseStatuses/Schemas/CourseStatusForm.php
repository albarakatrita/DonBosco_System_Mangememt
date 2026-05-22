<?php

namespace App\Filament\Resources\CourseStatuses\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseStatusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('status_name')
                    ->required(),
              ColorPicker::make('color')
        ->required(),
            ]);
    }
}
