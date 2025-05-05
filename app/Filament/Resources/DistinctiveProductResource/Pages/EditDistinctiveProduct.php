<?php

namespace App\Filament\Resources\DistinctiveProductResource\Pages;

use App\Filament\Resources\DistinctiveProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistinctiveProduct extends EditRecord
{
    protected static string $resource = DistinctiveProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
