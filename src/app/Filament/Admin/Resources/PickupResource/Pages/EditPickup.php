<?php

namespace App\Filament\Admin\Resources\PickupResource\Pages;

use App\Filament\Admin\Resources\PickupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPickup extends EditRecord
{
    protected static string $resource = PickupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
