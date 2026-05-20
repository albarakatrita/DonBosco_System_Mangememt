<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class UserInfoWidget extends Widget
{
    protected string $view = 'filament.widgets.user-info-widget';

    protected int|string|array $columnSpan = 'full';

    public function getUserInitials(): string
    {
        $name = Auth::user()->name ?? '';
        $words = explode(' ', trim($name));

        $initials = '';
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        return $initials;
    }
}
