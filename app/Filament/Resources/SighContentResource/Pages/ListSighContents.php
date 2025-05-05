<?php

namespace App\Filament\Resources\SighContentResource\Pages;

use App\Filament\Resources\SighContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSighContents extends ListRecords
{
    protected static string $resource = SighContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
