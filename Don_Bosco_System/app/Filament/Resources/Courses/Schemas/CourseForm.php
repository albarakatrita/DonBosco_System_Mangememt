<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                TextInput::make('required_number')
                    ->required()
                    ->numeric(),

                // TextInput::make('user_id')
                //     ->numeric()
                //     ->default(null),
                Select::make('donor_id')->relationship('donor','name')->label('Donor Name')->required(),
                Select::make('course_status_id')->relationship('courseStatus','status_name')->label('Status Course')->required(),
                  Toggle::make('has_interview')
                    ->required(),
                ]);
    }
}
