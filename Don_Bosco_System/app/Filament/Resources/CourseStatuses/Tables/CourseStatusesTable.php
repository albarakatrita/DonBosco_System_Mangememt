<?php

namespace App\Filament\Resources\CourseStatuses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CourseStatusesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status_name')
                    ->searchable(),
TextColumn::make('color')
    ->label('Color')
    ->formatStateUsing(fn (string $state) => "
        <div style='
            display:flex;
            align-items:center;
            justify-content:center;
            height:100%;
        '>
            <div style='
                width:18px;
                height:18px;
                border-radius:50%;
                background:$state;
                border:1px solid #ccc;
            '></div>
        </div>
    ")
    ->html()
    ->alignCenter(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
