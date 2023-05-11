<?php

namespace App\Filament\Resources\AttributeTypeResource\Pages;

use App\Filament\Resources\AttributeTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributeTypes extends ListRecords
{
    protected static string $resource = AttributeTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
