<?php

namespace App\Filament\Resources\CoffeeCultureResource\Pages;

use App\Filament\Resources\CoffeeCultureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoffeeCulture extends EditRecord
{
    protected static string $resource = CoffeeCultureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
