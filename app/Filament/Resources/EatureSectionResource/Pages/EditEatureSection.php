<?php

namespace App\Filament\Resources\EatureSectionResource\Pages;

use App\Filament\Resources\EatureSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEatureSection extends EditRecord
{
    protected static string $resource = EatureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
