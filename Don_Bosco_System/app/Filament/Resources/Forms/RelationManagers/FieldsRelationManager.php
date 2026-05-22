<?php

namespace App\Filament\Resources\Forms\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FieldsRelationManager extends RelationManager
{
    protected static string $relationship = 'fields';

    public function form(Schema $schema): Schema
    {
              return $schema->components([

            TextInput::make('label')
                ->required()
                ->live(),

            TextInput::make('name')
                ->required(),

          Select::make('type')
    ->options([
        'text' => 'Text',
        'textarea' => 'Textarea',
        'number' => 'Number',
        'select' => 'Select',
        'radio' => 'Radio',
        'checkbox' => 'Checkbox',
    ])
    ->required()
    ->live(),

            Toggle::make('required'),

            TextInput::make('placeholder')->required(),

            // TextInput::make('order_index')
            //    ->default(0)
            //     ,

            // ✅ Options only when needed
        Repeater::make('options')
    ->schema([

        TextInput::make('label')
            ->required(),

        TextInput::make('value')
            ->required(),

    ])

    ->default([])

    ->dehydrated(true)

    ->hidden(fn (callable $get) =>
        !in_array($get('type'), [
            'select',
            'radio',
            'checkbox',
        ])
    )

    ->columnSpanFull()
        ]);

    }

    public function table(Table $table): Table
    {
        return $table
        ->defaultSort('order_index')
        ->reorderable('order_index')
        ->columns([
            TextColumn::make('label')->searchable(),
            TextColumn::make('type'),
            IconColumn::make('required')->boolean(),
            TextColumn::make('order_index')
                ->label('#')
                ->sortable()
                ->badge(),
            TextColumn::make('form.title')
                ->label('Form Title') // 👈 هذا سيُظهر اسم الطلب أو النموذج
                ->sortable(),
        ])

     ->headerActions([
                CreateAction::make(),
            // AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                //DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);

    }
}
