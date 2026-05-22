<?php

namespace App\Filament\Resources\Forms\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Sleep;

class FormForm
{
    public static function configure(Schema $schema): Schema
    {

       return $schema->components([
        TextInput::make('title')->required(),

        Select::make('form_type')
            ->options([
                'registeration' => 'Registration',
                'rating' => 'Rating',
                'testing' => 'Testing',
            ])
            ->required(),

        Select::make('course_id')
            ->relationship('course','title')
            ->required(),
     Repeater::make('fixed_fields')
    ->label('Fixed fields')
    ->schema([
        Select::make('field')
            ->label('Field')
            ->options([
                'full_name' => 'Full Name',
                'email' => 'Email',
                'phone' => 'Phone',
                'age' => 'Age',
                'region' => 'Region',
                'education' => 'Education',
                'specialization' => 'Specialization',
                'graduation_year' => 'Graduation Year',
            ])
            ->required(),

        Toggle::make('required')
            ->label('Required')
            ->default(true),

        Toggle::make('visible')
            ->label('Visible')
            ->default(true),
    ])
    ->disableItemCreation()   // يمنع إضافة عناصر جديدة
    ->disableItemDeletion()   // يمنع حذف العناصر
    ->disableItemMovement()   // يمنع إعادة الترتيب
    ->columns(1)              // يجعل كل عنصر في صف مستقل
    ->defaultItems(8)         // عدد الحقول الثابتة
   // ->collapsed()          // عرض منسق ومضغوط


    ]);
    }
}
