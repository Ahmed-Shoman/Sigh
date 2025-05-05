<?php

namespace App\Filament\Resources\SighContentResource\Pages;

use App\Filament\Resources\SighContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSighContent extends EditRecord
{
    protected static string $resource = SighContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
