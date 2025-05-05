<?php

namespace App\Filament\Resources\CoffeeCultureResource\Pages;

use App\Filament\Resources\CoffeeCultureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoffeeCultures extends ListRecords
{
    protected static string $resource = CoffeeCultureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
