<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Don Bosco Management System';
    protected static ?string $navigationLabel = 'Don Bosco Management System';

    public function getHeaderWidgets(): array
    {

        return [
            \App\Filament\Widgets\UserInfoWidget::class,
        ];
    }
}
