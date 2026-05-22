<?php

namespace App\Filament\Resources\Forms\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FormsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->columns([

                // TITLE
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                // TYPE
                TextColumn::make('form_type')
                    ->label('Form Type'),

                // PUBLISHED STATUS
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                // PUBLIC LINK (SAFE)
                TextColumn::make('public_url')

                    ->label('Public Link')

                    ->state(fn ($record) =>

                        $record->is_published && $record->slug
                            ? route('forms.public.show', $record->slug)
                            : 'Not Published'
                    )

                    ->url(fn ($record) =>

                        $record->is_published && $record->slug
                            ? route('forms.public.show', $record->slug)
                            : null
                    )

                    ->openUrlInNewTab()

                    ->copyable()

                    ->limit(40),

                // USER
                TextColumn::make('user.name')
                    ->label('User'),

                // DATE
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])

            ->recordActions([

                // EDIT
                EditAction::make(),

                // PUBLISH
                Action::make('publish')

                    ->label('Publish')

                    ->icon('heroicon-o-globe-alt')

                    ->color('success')

                    ->visible(fn ($record) =>
                        !$record->is_published
                    )

                    ->requiresConfirmation()

                    ->action(function ($record) {

                        // 🔥 ensure slug exists
                        if (!$record->slug) {
                            $record->slug = Str::slug($record->title . '-' . uniqid());
                        }

                        $record->is_published = true;
                        $record->published_at = now();

                        $record->save();
                    }),

                // UNPUBLISH
                Action::make('unpublish')

                    ->label('Unpublish')

                    ->icon('heroicon-o-lock-closed')

                    ->color('danger')

                    ->visible(fn ($record) =>
                        $record->is_published
                    )

                    ->requiresConfirmation()

                    ->action(function ($record) {

                        $record->update([
                            'is_published' => false,
                        ]);
                    }),

            ])

            ->toolbarActions([

                BulkActionGroup::make([

                    DeleteBulkAction::make(),

                ]),

            ]);
    }
}
