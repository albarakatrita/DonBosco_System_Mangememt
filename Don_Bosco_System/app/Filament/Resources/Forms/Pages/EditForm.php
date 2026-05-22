<?php

namespace App\Filament\Resources\Forms\Pages;

use App\Filament\Resources\Forms\FormResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditForm extends EditRecord
{
    protected static string $resource = FormResource::class;
// protected function mutateFormDataBeforeSave(array $data): array
// {
//     if (isset($data['fixed_fields'])) {

//         foreach ($data['fixed_fields'] as $index => $field) {

//             $data['fixed_fields'][$index]['order'] = $index + 1;
//         }
//     }

//     return $data;
// }
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
