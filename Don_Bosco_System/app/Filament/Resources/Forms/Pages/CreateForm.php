<?php

namespace App\Filament\Resources\Forms\Pages;

use App\Filament\Resources\Forms\FormResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateForm extends CreateRecord
{
    protected static string $resource = FormResource::class;
  protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = Auth::id();

    return $data;
}

    }
