<?php

namespace App\Filament\Resources\AttributeValueResource\Pages;

use App\Filament\Resources\AttributeValueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttributeValue extends EditRecord
{
    protected static string $resource = AttributeValueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
